<?php

function contactForm($position = 'left', $colorScheme = 'light') {

  $validation_messages = [];
	$success_message = '';

	if ( isset( $_POST['contact_form'] ) ) {

		//Sanitize the data
		$full_name = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
		$email     = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
		$phone     = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
		$message   = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

		//Validate the data
		if ( strlen( $full_name ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid name.', 'twentytwentyone' );
		}

		if ( strlen( $email ) === 0 or
		     ! is_email( $email ) ) {
			$validation_messages[] = esc_html__( 'Please enter a valid email address.', 'twentytwentyone' );
		}

		if ( strlen( $message ) === 0 ) {
			$validation_messages[] = esc_html__( 'Please enter a valid message.', 'twentytwentyone' );
		}

		//Send an email to the WordPress administrator if there are no validation errors
		if ( empty( $validation_messages ) ) {

			$adminEmail    = get_option( 'admin_email' );
			$subject = 'Website contact form message from ' . $full_name;
      $adminMessage = '
      <h4>New message from the website contact form:</h4>
      <h4>Message from: ' . $full_name . '</h4>
      <h4>Phone: <a href="tel:' . $phone . '">' . $phone . '</a></h4>
      <h4>Email: <a href="mailto:' . $email . '">' . $email . '</a></h4>
      <p>
        ' . $message . '
      </p>';

      $adminMessage = stripslashes($adminMessage);

			$customerSubject = 'Thank you for your message, ' . $full_name;
			$customerMessage = '
      <h4>This is a confirmation that you sent us the following message:</h4>
      <p>
      ' . $message . '
      </p>
      <h4>Thank you for contacting Pinnacle Solar.</h4>
      ';
      $customerMessage = stripslashes($customerMessage);

			wp_mail( $adminEmail, $subject, $adminMessage );
			wp_mail( $email, $customerSubject, $customerMessage );

      $total_success = 'Your message has been successfully sent.';
			$success_message = esc_html__( $total_success, 'twentytwentyone' );

		}

	}

	//Display the validation errors
	if ( ! empty( $validation_messages ) ) {
		foreach ( $validation_messages as $validation_message ) {
			echo '<div class="validation-message">' . esc_html( $validation_message ) . '</div>';
		}
	}

	//Display the success message
	if ( strlen( $success_message ) > 0 ) {
		echo '<div class="success-message">' . esc_html( $success_message ) . '</div>';
	}

	?>


  <form class="<?php echo $colorScheme ?>" id="contact-form" action="<?php echo esc_url( get_permalink() ); ?>"
          method="post">
    <input type="hidden" name="contact_form">
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="FULL NAME" type="text" id="full-name" name="full_name">
    </div>
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="EMAIL" type="email" id="email" name="email">
    </div>
    <div class="contact-form__group">
      <input class="contact-form__input" placeholder="CONTACT NUMBER" type="tell" id="phone" name="phone">
    </div>
    <div class="contact-form__group contact-form__group--message">
      <textarea class="contact-form__input contact-form__input--message" rows="8" placeholder="MESSAGE" id="message" name="message"></textarea>
    </div>
    <div class="contact-form__group contact-form__buttons contact-form__buttons--<?php echo $position ?>">
      <button type="submit" value="<?php echo esc_attr( 'Submit' ); ?>" class="contact-form__button btn btn--sm">SEND</button>
    </div>
  </form>

  <div id="validation-messages-container"></div>

<?php }
