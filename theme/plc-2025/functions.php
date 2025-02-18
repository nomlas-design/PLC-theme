<?php
// Enqueue theme styles and scripts
function plc_2025_enqueue_assets()
{
  // Get file modification times for cache busting
  $css_path = get_stylesheet_directory() . '/dist/css/main.css';
  $js_path = get_stylesheet_directory() . '/dist/js/main.js';

  $css_version = file_exists($css_path) ? filemtime($css_path) : '1.0.0';
  $js_version = file_exists($js_path) ? filemtime($js_path) : '1.0.0';

  // Add timestamp to CSS for cache busting
  wp_enqueue_style(
    'theme-css',
    get_stylesheet_directory_uri() . '/dist/css/main.css',
    [],
    $css_version
  );

  wp_enqueue_script(
    'theme-js',
    get_stylesheet_directory_uri() . '/dist/js/main.js',
    [],
    $js_version,
    true
  );
}

add_action('wp_enqueue_scripts', 'plc_2025_enqueue_assets');

// Enable theme support features
function plc_2025_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
}
add_action('after_setup_theme', 'plc_2025_setup');

// Register a navigation menu
function plc_2025_register_menus()
{
  register_nav_menus([
    'primary' => __('Primary Menu', 'plc_2025'),
  ]);
}
add_action('init', 'plc_2025_register_menus');

echo '<p>CSS Path: ' . get_template_directory_uri() . '/dist/css/main.css</p>';
echo '<p>JS Path: ' . get_template_directory_uri() . '/dist/js/main.js</p>';
