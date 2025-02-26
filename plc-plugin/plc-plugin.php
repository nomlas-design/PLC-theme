<?php

/**
 * Plugin Name: PLC Custom Functionality
 * Description: A plugin developed for The Public Land Consultancy.
 * Version: 1.0.0
 * Author: Declan O'Hara
 * Text Domain: plc-plugin
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


function plc_register_hero_cpt()
{
  register_post_type('plc_hero', array(
    'labels' => array(
      'name' => __('Hero Images', 'plc-plugin'),
      'singular_name' => __('Hero Image', 'plc-plugin'),
      'add_new' => __('Add New Hero Image', 'plc-plugin'),
      'add_new_item' => __('Add New Hero Image', 'plc-plugin'),
      'edit_item' => __('Edit Hero Image', 'plc-plugin'),
      'new_item' => __('New Hero Image', 'plc-plugin'),
      'view_item' => __('View Hero Image', 'plc-plugin'),
      'search_items' => __('Hero Images', 'plc-plugin'),
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title'),
    'menu_icon' => 'dashicons-images-alt2',
  ));
}
add_action('init', 'plc_register_hero_cpt');
