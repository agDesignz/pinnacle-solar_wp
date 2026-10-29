<?php
/**
 * Plugin Name: Pinnacle Contact Form (reference example)
 * Description: A secure, documented contact form: nonce, honeypot, rate limit, validation, SMTP.
 * Version:     1.0.0
 * Text Domain: pcf
 *
 * Documentation: contact-form-docs.md (section numbers match the comments below).
 * Required wp-config.php constants: see "Configuration" in the docs.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. SETTINGS

const PCF_MAX_NAME    = 100;
const PCF_MAX_PHONE   = 30;
const PCF_MAX_MESSAGE = 5000;

const PCF_RATE_LIMIT  = 3;
const PCF_RATE_WINDOW = 1 * MINUTE_IN_SECONDS;

// 2. SMTP CONFIGURATION

add_action( 'phpmailer_init', 'pcf_configure_smtp' );

function pcf_configure_smtp( $phpmailer ) {

	// ---- Guard: required constants

	$required = array(
		'PCF_SMTP_HOST',
		'PCF_SMTP_PORT',
		'PCF_SMTP_USER',
		'PCF_SMTP_PASS',
		'PCF_SMTP_SECURE',
		'PCF_SMTP_FROM',
	);
	foreach ( $required as $constant_name ) {
		if ( ! defined( $constant_name ) ) {
			return;
		}
	}

	// ---- Configure PHPMailer

	$phpmailer->isSMTP();
	$phpmailer->Host       = PCF_SMTP_HOST;
	$phpmailer->SMTPAuth   = true;
	$phpmailer->Port       = PCF_SMTP_PORT;
	$phpmailer->Username   = PCF_SMTP_USER;
	$phpmailer->Password   = PCF_SMTP_PASS;
	$phpmailer->SMTPSecure = PCF_SMTP_SECURE;

	$from_name = defined( 'PCF_SMTP_NAME' ) ? PCF_SMTP_NAME : get_bloginfo( 'name' );
	$phpmailer->setFrom( PCF_SMTP_FROM, $from_name );
}

// ---- Default sender (replaces wordpress@localhost)
 
add_filter( 'wp_mail_from', 'pcf_mail_from' );
 
function pcf_mail_from( $email ) {
	return defined( 'PCF_SMTP_FROM' ) ? PCF_SMTP_FROM : $email;
}
 
add_filter( 'wp_mail_from_name', 'pcf_mail_from_name' );
 
function pcf_mail_from_name( $name ) {
	return defined( 'PCF_SMTP_NAME' ) ? PCF_SMTP_NAME : $name;
}


// ---- Logging mail failures

add_action( 'wp_mail_failed', 'pcf_log_mail_failure' );

function pcf_log_mail_failure( $error ) {
	error_log( 'PCF mail failure: ' . $error->get_error_message() );
}

// 3. SMALL HELPERS

// ---- pcf_state(): shared state between handler and renderer

function pcf_state( $new_state = null ) {
	static $state = array(
		'errors' => array(),
		'values' => array(),
	);

	if ( null !== $new_state ) {
		$state = $new_state;
	}

	return $state;
}

// ---- pcf_post_field(): read, unslash and sanitize one $_POST field

function pcf_post_field( $key, $type = 'text' ) {

	if ( ! isset( $_POST[ $key ] ) || ! is_string( $_POST[ $key ] ) ) {
		return '';
	}

	$raw = wp_unslash( $_POST[ $key ] );

	switch ( $type ) {

		case 'email':
			return sanitize_email( $raw );

		case 'textarea':
			return sanitize_textarea_field( $raw );

		case 'phone':
			return preg_replace( '/[^0-9+()\-.\s]/', '', sanitize_text_field( $raw ) );

		default:
			return sanitize_text_field( $raw );
	}
}

// ---- pcf_current_page_url()

function pcf_current_page_url() {
	$url = get_permalink( get_queried_object_id() );

	return $url ? $url : home_url( '/' );
}

// ---- pcf_redirect_to_success()

function pcf_redirect_to_success() {
	$url = add_query_arg( 'pcf_status', 'sent', pcf_current_page_url() );

	wp_safe_redirect( $url . '#contact-form' );
	exit;
}

// ---- pcf_is_rate_limited()

function pcf_is_rate_limited() {

	$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : 'unknown';

	$key   = 'pcf_rl_' . md5( $ip );
	$count = (int) get_transient( $key );

	if ( $count >= PCF_RATE_LIMIT ) {
		return true;
	}

	set_transient( $key, $count + 1, PCF_RATE_WINDOW );
	return false;
}

// ---- pcf_captcha_passes()
// TEMPORARY STUB: always passes. Replace with ALTCHA verification before going live.

function pcf_captcha_passes() {
	return true;
}

// 4. THE HANDLER: processes the submission

add_action( 'template_redirect', 'pcf_handle_submission' );

function pcf_handle_submission() {

	// ---- Step 1: is this request our form being submitted?

	$method = isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '';
	if ( 'POST' !== $method || ! isset( $_POST['pcf_form'] ) ) {
		return;
	}

	// ---- Step 2: read and sanitize

	$values = array(
		'full_name' => pcf_post_field( 'full_name' ),
		'email'     => pcf_post_field( 'email', 'email' ),
		'phone'     => pcf_post_field( 'phone', 'phone' ),
		'message'   => pcf_post_field( 'message', 'textarea' ),
	);

	$errors = array();

	// ---- Step 3: nonce

	$nonce = isset( $_POST['pcf_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['pcf_nonce'] ) ) : '';

	if ( ! wp_verify_nonce( $nonce, 'pcf_submit' ) ) {
		$errors[] = __( 'Your session expired. Please try sending again.', 'pcf' );
		pcf_state( array( 'errors' => $errors, 'values' => $values ) );
		return;
	}

	// ---- Step 4: honeypot

	if ( '' !== pcf_post_field( 'pcf_hp' ) ) {
		pcf_redirect_to_success();
	}

	// ---- Step 5: validate

	if ( '' === $values['full_name'] ) {
		$errors[] = __( 'Please enter your name.', 'pcf' );
	} elseif ( mb_strlen( $values['full_name'] ) > PCF_MAX_NAME ) {
		$errors[] = __( 'Your name is too long.', 'pcf' );
	}

	if ( ! is_email( $values['email'] ) ) {
		$errors[] = __( 'Please enter a valid email address.', 'pcf' );
	}

	if ( '' !== $values['phone'] && ! preg_match( '/^[0-9+()\-.\s]{6,' . PCF_MAX_PHONE . '}$/', $values['phone'] ) ) {
		$errors[] = __( 'Please enter a valid phone number, or leave it blank.', 'pcf' );
	}

	if ( '' === $values['message'] ) {
		$errors[] = __( 'Please enter a message.', 'pcf' );
	} elseif ( mb_strlen( $values['message'] ) > PCF_MAX_MESSAGE ) {
		$errors[] = __( 'Your message is too long.', 'pcf' );
	}

	if ( ! empty( $errors ) ) {
		pcf_state( array( 'errors' => $errors, 'values' => $values ) );
		return;
	}

	// ---- Step 6: captcha

	if ( ! pcf_captcha_passes() ) {
		$errors[] = __( 'Spam check failed. Please try again.', 'pcf' );
		pcf_state( array( 'errors' => $errors, 'values' => $values ) );
		return;
	}

	// ---- Step 7: rate limit

	if ( pcf_is_rate_limited() ) {
		$errors[] = __( 'You have sent several messages recently. Please try again later.', 'pcf' );
		pcf_state( array( 'errors' => $errors, 'values' => $values ) );
		return;
	}

	// ---- Step 8: build and send the email

	// Recipient
	$to = ( defined( 'PCF_TO_EMAIL' ) && is_email( PCF_TO_EMAIL ) )
		? PCF_TO_EMAIL
		: get_option( 'admin_email' );

	// Subject
	$subject = 'Website contact form message from ' . $values['full_name'];

	// Body
	$tel = preg_replace( '/[^0-9+]/', '', $values['phone'] );

	$body  = '<h3>New message from the website contact form</h3>';
	$body .= '<p><strong>From:</strong> ' . esc_html( $values['full_name'] ) . '</p>';
	$body .= '<p><strong>Email:</strong> <a href="' . esc_url( 'mailto:' . $values['email'] ) . '">'
		. esc_html( $values['email'] ) . '</a></p>';
	if ( '' !== $values['phone'] ) {
		$body .= '<p><strong>Phone:</strong> <a href="' . esc_url( 'tel:' . $tel ) . '">'
			. esc_html( $values['phone'] ) . '</a></p>';
	}
	$body .= '<p><strong>Message:</strong></p><p>' . nl2br( esc_html( $values['message'] ) ) . '</p>';

	// Headers
	$headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'Reply-To: ' . $values['email'],
	);

	// Send
	$sent = wp_mail( $to, $subject, $body, $headers );

	if ( ! $sent ) {
		$errors[] = __( 'Sorry, your message could not be sent. Please try again later.', 'pcf' );
		pcf_state( array( 'errors' => $errors, 'values' => $values ) );
		return;
	}

	// ---- Step 9: success (Post/Redirect/Get)

	pcf_redirect_to_success();
}

// 5. THE RENDERER: returns the form markup

function pcf_render_contact_form( $position = 'left', $color_scheme = 'light' ) {

	$state = pcf_state();

	$values = wp_parse_args(
		$state['values'],
		array(
			'full_name' => '',
			'email'     => '',
			'phone'     => '',
			'message'   => '',
		)
	);
	$errors = $state['errors'];

	$sent = empty( $errors )
		&& isset( $_GET['pcf_status'] )
		&& 'sent' === sanitize_key( wp_unslash( $_GET['pcf_status'] ) );

	ob_start();
	?>

	<?php foreach ( $errors as $error ) : ?>
		<div class="validation-message" role="alert"><?php echo esc_html( $error ); ?></div>
	<?php endforeach; ?>

	<?php if ( $sent ) : ?>
		<div class="success-message" role="status"><?php esc_html_e( 'Your message has been sent. Thank you!', 'pcf' ); ?></div>
	<?php endif; ?>

	<form
		class="<?php echo esc_attr( $color_scheme ); ?>"
		id="contact-form"
		action="<?php echo esc_url( pcf_current_page_url() ); ?>"
		method="post"
	>
		<?php // Marker, nonce, honeypot ?>
		<input type="hidden" name="pcf_form" value="1">
		<?php wp_nonce_field( 'pcf_submit', 'pcf_nonce', false ); ?>
		<div aria-hidden="true" style="position:absolute;left:-9999px;">
			<label for="pcf-hp"><?php esc_html_e( 'Leave this field empty', 'pcf' ); ?></label>
			<input type="text" id="pcf-hp" name="pcf_hp" tabindex="-1" autocomplete="off">
		</div>

		<?php // Name ?>
		<div class="contact-form__group">
			<label class="screen-reader-text" for="pcf-full-name"><?php esc_html_e( 'Full name', 'pcf' ); ?></label>
			<input
				class="contact-form__input"
				type="text"
				id="pcf-full-name"
				name="full_name"
				placeholder="<?php echo esc_attr__( 'FULL NAME', 'pcf' ); ?>"
				value="<?php echo esc_attr( $values['full_name'] ); ?>"
				maxlength="<?php echo (int) PCF_MAX_NAME; ?>"
				autocomplete="name"
				required
			>
		</div>

		<?php // Email ?>
		<div class="contact-form__group">
			<label class="screen-reader-text" for="pcf-email"><?php esc_html_e( 'Email', 'pcf' ); ?></label>
			<input
				class="contact-form__input"
				type="email"
				id="pcf-email"
				name="email"
				placeholder="<?php echo esc_attr__( 'EMAIL', 'pcf' ); ?>"
				value="<?php echo esc_attr( $values['email'] ); ?>"
				maxlength="254"
				autocomplete="email"
				required
			>
		</div>

		<?php // Phone ?>
		<div class="contact-form__group">
			<label class="screen-reader-text" for="pcf-phone"><?php esc_html_e( 'Contact number', 'pcf' ); ?></label>
			<input
				class="contact-form__input"
				type="tel"
				id="pcf-phone"
				name="phone"
				placeholder="<?php echo esc_attr__( 'CONTACT NUMBER', 'pcf' ); ?>"
				value="<?php echo esc_attr( $values['phone'] ); ?>"
				maxlength="<?php echo (int) PCF_MAX_PHONE; ?>"
				autocomplete="tel"
			>
		</div>

		<?php // Message (textarea content must stay on one line) ?>
		<div class="contact-form__group contact-form__group--message">
			<label class="screen-reader-text" for="pcf-message"><?php esc_html_e( 'Message', 'pcf' ); ?></label>
			<textarea class="contact-form__input contact-form__input--message" rows="8" id="pcf-message" name="message" placeholder="<?php echo esc_attr__( 'MESSAGE', 'pcf' ); ?>" maxlength="<?php echo (int) PCF_MAX_MESSAGE; ?>" required><?php echo esc_textarea( $values['message'] ); ?></textarea>
		</div>

		<?php // Button ?>
		<div class="contact-form__group contact-form__buttons contact-form__buttons--<?php echo esc_attr( $position ); ?>">
			<button type="submit" class="contact-form__button btn btn--sm"><?php esc_html_e( 'SEND', 'pcf' ); ?></button>
		</div>
	</form>

	<?php
	return ob_get_clean();
}

// 6. SHORTCODE

add_shortcode( 'pcf_contact_form', 'pcf_shortcode' );

function pcf_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'position' => 'left',
			'scheme'   => 'light',
		),
		$atts,
		'pcf_contact_form'
	);

	return pcf_render_contact_form( $atts['position'], $atts['scheme'] );
}