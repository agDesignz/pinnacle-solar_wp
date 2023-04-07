<!DOCTYPE html>
<html  <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php
    wp_head();
  ?>

  </script>

  <title>Pinnacle Solar</title>
</head>

<body <?php body_class(); ?>>

<header class="header">
<div class="header__top">
  <div class="header__branding">
    <a href="#" class="header__home-link">
      <img class="header__logo" src="<?php echo get_theme_file_uri('/assets/images/logo-new.png') ?>" alt="Pinnacle Solar Logo">
    </a>
  </div>
  <div class="header__container">

    <?php
      wp_nav_menu([
        'theme_lacation' => 'headerMenuLocation',
        'menu_class' => 'nav',
        'container' => 'null'
      ]);
    ?>

    <input type="checkbox" class="hamburger__checkbox" id="nav-toggle">
    <label for="nav-toggle" class="hamburger__button hamburger__button--corner">
      <span class="hamburger__icon">&nbsp;</span>
    </label>
  </div>
</div>
</header>
