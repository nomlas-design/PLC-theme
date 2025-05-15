<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Presenters Custom Post Type
function plc_register_presenters_cpt()
{
  register_post_type('plc_presenter', array(
    'labels' => array(
      'name' => __('Presenters', 'plc-courses'),
      'singular_name' => __('Presenter', 'plc-courses'),
      'add_new' => __('Add New Presenter', 'plc-courses'),
      'add_new_item' => __('Add New Presenter', 'plc-courses'),
      'edit_item' => __('Edit Presenter', 'plc-courses'),
      'new_item' => __('New Presenter', 'plc-courses'),
      'view_item' => __('View Presenter', 'plc-courses'),
      'search_items' => __('Search Presenters', 'plc-courses'),
    ),
    'public' => true,
    'has_archive' => false,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-id',
  ));
}
add_action('init', 'plc_register_presenters_cpt');
