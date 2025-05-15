<?php

/**
 * Header Template
 * 
 * @package PLC_theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon.png" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="header">
    <div class='container'>
      <div class="header__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <div class='header__items'>
        <div class='header__menu header__menu--left'>

          <nav class="nav nav--secondary" aria-label="Main Secondary Menu">
            <a href='/about-us' class='nav__link'>About Us</a>
            <a href='/terra-publica' class='nav__link'>Terra Publica</a>
            <a href='/contact' class='nav__link'>Contact Us</a>
          </nav>
        </div>

        <div class='header__menu header__menu--right'>
          <nav class="nav nav--primary" aria-label="Main Primary Menu">
            <div class='nav__link nav__link--dropdown'>
              <div class='nav__link'>Professional Development</>
                <div class='nav__dropdown'>
                  <a href='/consultancy-services' class='nav__link'>Courses & Events</a>
                  <a href='/consultancy-services' class='nav__link'>Professional Certificates</a>
                  <a href='/consultancy-services' class='nav__link'>Courses for Licensed Surveyors</a>
                </div>
                <a href='/consultancy-services' class='nav__link'>Consultancy Services</a>

          </nav>
          <button class="search-toggle" aria-label="Toggle Search">
            <img class='icon icon--light' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt="Search" />
            <img class='icon icon--dark' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt="Search" />
          </button>
        </div>
      </div>
      <button
        class='menu-toggle'
        aria-label="Toggle Menu"
        aria-controls="primary-menu"
        aria-expanded="false"
        id='menu-toggle'>
        <span class='bar'></span>
        <span class='bar'></span>
        <span class='bar'></span>
      </button>
    </div>
  </header>