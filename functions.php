<?php

require get_theme_file_path('/inc/contact-form.php');

function pinnacle_theme_support() {
  register_nav_menu('headerMenuLocation', 'Header Menu Location');

  // Adds dynamic title tag support
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'pinnacle_theme_support');

function pinnacle_files() {
  wp_enqueue_script('main_pinnacle_javascript', get_theme_file_uri('./build/index.js'), array(), '1.0', true);
  wp_enqueue_style('pinnacle-font-gotham', "https://fonts.cdnfonts.com/css/gotham", array(), '1.0', 'all');
  wp_enqueue_style('pinnacle-font-roboto', "https://fonts.cdnfonts.com/css/roboto", array(), '1.0', 'all');
  wp_enqueue_style('pinnacle-icons', "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css", array(), '1.0', 'all');
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('pinnacle-stylesheet', get_template_directory_uri()."/build/index.css", array('pinnacle-font-gotham', 'pinnacle-font-roboto'), $version, 'all');
}
add_action('wp_enqueue_scripts', 'pinnacle_files');


// Send email via SMTP
add_action( 'phpmailer_init', 'contact_form_mail' );
function contact_form_mail( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = SMTP_AUTH;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USER;
    $phpmailer->Password = SMTP_PASS;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_NAME;
}
