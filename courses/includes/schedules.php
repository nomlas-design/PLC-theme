<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Schedules Custom Post Type
function plc_register_schedules_cpt()
{
  register_post_type('plc_schedule', array(
    'labels' => array(
      'name' => __('View Schedules', 'plc-courses'),
      'singular_name' => __('Schedule', 'plc-courses'),
      'add_new' => __('Add New Schedule', 'plc-courses'),
      'add_new_item' => __('Add New Schedule', 'plc-courses'),
      'edit_item' => __('Edit Schedule', 'plc-courses'),
      'new_item' => __('New Schedule', 'plc-courses'),
      'view_item' => __('View Schedule', 'plc-courses'),
      'search_items' => __('Search Schedules', 'plc-courses'),
    ),
    'public' => false,
    'show_ui' => true,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-calendar-alt',
  ));
}
add_action('init', 'plc_register_schedules_cpt');
