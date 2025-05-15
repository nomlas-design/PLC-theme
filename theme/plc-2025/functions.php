<?php
// Enqueue theme styles and scripts
function plc_2025_enqueue_assets()
{
  // Enqueue Google Fonts (Source Sans Pro)
  wp_enqueue_style(
    'source-sans-pro',
    'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;500;600&display=swap',
    [],
    null
  );

  // Get file modification times for cache busting
  $css_path = get_stylesheet_directory() . '/dist/css/main.css';
  $js_path = get_stylesheet_directory() . '/dist/js/main.js';
  $css_version = file_exists($css_path) ? filemtime($css_path) : '1.0.0';
  $js_version = file_exists($js_path) ? filemtime($js_path) : '1.0.0';

  // Add timestamp to CSS for cache busting
  wp_enqueue_style(
    'theme-css',
    get_stylesheet_directory_uri() . '/dist/css/main.css',
    ['source-sans-pro'], // Make theme CSS depend on Google Fonts
    $css_version
  );

  wp_enqueue_script(
    'theme-js',
    get_stylesheet_directory_uri() . '/dist/js/main.js',
    [],
    $js_version,
    true
  );

  if (is_front_page()) {
    wp_enqueue_style(
      'splide-core',
      'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css',
      array(),
      '4.1.4'
    );
    wp_enqueue_script(
      'slider',
      get_stylesheet_directory_uri() . '/dist/js/slider.js',
      [],
      $js_version,
      true
    );
  }

  // single post page plc_course

  if (is_singular('plc_course')) {

    wp_enqueue_script(
      'course',
      get_stylesheet_directory_uri() . '/dist/js/course.js',
      [],
      $js_version,
      true
    );
  }

  if (is_post_type_archive('plc_course')) {
    wp_enqueue_script(
      'plc-read-more',
      get_template_directory_uri() . '/dist/js/courses.js',
      array(),
      '1.0.0',
      true
    );
  }

  if (is_page_template('page-templates/booking.php')) {
    wp_enqueue_script(
      'plc-booking',
      get_template_directory_uri() . '/dist/js/booking.js',
      array(),
      '1.0.0',
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'plc_2025_enqueue_assets');

// Order schedules

add_action('save_post_plc_schedule', function ($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (wp_is_post_revision($post_id)) return;

  $sessions = get_field('session', $post_id);
  if (empty($sessions) || !is_array($sessions)) {
    delete_post_meta($post_id, 'first_session_date');
    return;
  }
  $dates = array_filter(array_column($sessions, 'date')); // Get all non-empty dates
  sort($dates); // Earliest date first
  update_post_meta($post_id, 'first_session_date', reset($dates));
});


// Enable theme support features
function plc_2025_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('menus');

  require_once get_stylesheet_directory() . '/components/button.php';
  require_once get_stylesheet_directory() . '/components/accordion.php';
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


// Remove comments
function remove_comments_menu()
{
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_menu');

// Remove Comments from admin bar
function remove_comments_admin_bar()
{
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'remove_comments_admin_bar');



/**
 * Allow SVG uploads
 */
function plc_2025_allow_svg_upload($mime_types)
{
  // Add SVG to the list of allowed MIME types
  $mime_types['svg'] = 'image/svg+xml';
  $mime_types['svgz'] = 'image/svg+xml';

  return $mime_types;
}
add_filter('upload_mimes', 'plc_2025_allow_svg_upload');

/**
 * Fix SVG upload issues
 */
function plc_2025_fix_svg_upload_check($checked, $file, $filename, $mimes)
{
  if (!$checked['type']) {
    $svg_check = wp_check_filetype($filename, ['svg' => 'image/svg+xml', 'svgz' => 'image/svg+xml']);
    $check_extension = $svg_check['ext'];

    if ('svg' === $check_extension || 'svgz' === $check_extension) {
      $checked['type'] = 'image/svg+xml';
      $checked['ext'] = $check_extension;
      $checked['proper_filename'] = $filename;
    }
  }

  return $checked;
}
add_filter('wp_check_filetype_and_ext', 'plc_2025_fix_svg_upload_check', 10, 4);

/**
 * Generate thumbnails for SVG files
 */
function plc_2025_fix_svg_preview($response, $attachment, $meta)
{
  // Check if the file is an SVG
  if ($response['mime'] === 'image/svg+xml') {
    // Get the SVG size from the meta data or set a default size
    $width = !empty($meta['width']) ? $meta['width'] : 512;
    $height = !empty($meta['height']) ? $meta['height'] : 512;

    $response['sizes'] = [
      'full' => [
        'url' => $response['url'],
        'width' => $width,
        'height' => $height,
        'orientation' => $width > $height ? 'landscape' : 'portrait',
      ]
    ];
  }

  return $response;
}
add_filter('wp_prepare_attachment_for_js', 'plc_2025_fix_svg_preview', 10, 3);
