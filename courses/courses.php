<?php

/**
 * Plugin Name: PLC Courses
 * Description: A plugin for managing courses, schedules, presenters, and bookings.
 * Version: 1.0.0
 * Author: Declan O'Hara
 * Text Domain: plc-courses
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/courses.php';
require_once plugin_dir_path(__FILE__) . 'includes/schedules.php';
require_once plugin_dir_path(__FILE__) . 'includes/presenters.php';
require_once plugin_dir_path(__FILE__) . 'includes/bookings.php';
require_once plugin_dir_path(__FILE__) . 'includes/terra.php';
require_once plugin_dir_path(__FILE__) . 'includes/staff.php';
