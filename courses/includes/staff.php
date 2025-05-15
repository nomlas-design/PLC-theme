<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Staff Custom Post Type
function plc_register_staff_cpt()
{
  register_post_type('plc_staff', array(
    'labels' => array(
      'name' => __('Staff', 'plc-courses'),
      'singular_name' => __('Staff', 'plc-courses'),
      'add_new' => __('Add New Staff', 'plc-courses'),
      'add_new_item' => __('Add New Staff', 'plc-courses'),
      'edit_item' => __('Edit Staff', 'plc-courses'),
      'new_item' => __('New Staff', 'plc-courses'),
      'view_item' => __('View Staff', 'plc-courses'),
      'search_items' => __('Search Staff', 'plc-courses'),
    ),
    'public' => false,
    'show_ui' => true,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-businessperson',
  ));
}
add_action('init', 'plc_register_staff_cpt');
