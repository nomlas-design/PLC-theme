<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Courses Custom Post Type
function plc_register_courses_cpt()
{
  register_post_type('plc_course', array(
    'labels' => array(
      'name' => __('Courses', 'plc-courses'),
      'singular_name' => __('Course', 'plc-courses'),
      'add_new' => __('Add New Course', 'plc-courses'),
      'add_new_item' => __('Add New Course', 'plc-courses'),
      'edit_item' => __('Edit Course', 'plc-courses'),
      'new_item' => __('New Course', 'plc-courses'),
      'view_item' => __('View Course', 'plc-courses'),
      'search_items' => __('Search Courses', 'plc-courses'),
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_icon' => 'dashicons-welcome-learn-more',
  ));
}
add_action('init', 'plc_register_courses_cpt');
