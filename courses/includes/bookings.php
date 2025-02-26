<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Register Booking Table on Plugin Activation
function plc_create_booking_table()
{
  global $wpdb;
  $table_name = $wpdb->prefix . 'plc_bookings';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        schedule_id bigint(20) UNSIGNED NOT NULL,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20) NOT NULL,
        notes text NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
}

function plc_update_booking_table()
{
  plc_create_booking_table();
}
register_activation_hook(__FILE__, 'plc_create_booking_table');
register_activation_hook(__FILE__, 'plc_update_booking_table');
