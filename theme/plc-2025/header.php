<?php

/**
 * Header Template
 * 
 * @package PLC
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="header">
    <div class='container'>
      <div class="header__logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <div class='header__items'>
        <div class='header__menu'>
          <nav class="nav nav--secondary" aria-label="Main Secondary Menu">
            <a href='#' class='nav__link'>About</a>
            <a href='#' class='nav__link'>Publications</a>
            <a href='#' class='nav__link'>Contact</a>
          </nav>
        </div>
        <div class='header__menu'>
          <nav class="nav nav--primary" aria-label="Main Primary Menu">
            <a href='#' class='nav__link'>Professional Development</a>
            <a href='#' class='nav__link'>Consultancy Services</a>

          </nav>
          <button class="search-toggle" aria-label="Toggle Search">
            <img class='icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/search.svg" alt="Search" />
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