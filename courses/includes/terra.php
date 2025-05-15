<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Terra Publica Custom Post Type
function plc_register_terra_cpt()
{
  register_post_type('plc_terra', array(
    'labels' => array(
      'name' => __('Terra Publica', 'plc-courses'),
      'singular_name' => __('Publication', 'plc-courses'),
      'add_new' => __('Add New Publication', 'plc-courses'),
      'add_new_item' => __('Add New Publication', 'plc-courses'),
      'edit_item' => __('Edit Publication', 'plc-courses'),
      'new_item' => __('New Publication', 'plc-courses'),
      'view_item' => __('View Publication', 'plc-courses'),
      'search_items' => __('Search Publications', 'plc-courses'),
    ),
    'public' => true,
    'has_archive' => false,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-book',
  ));
}
add_action('init', 'plc_register_terra_cpt');
