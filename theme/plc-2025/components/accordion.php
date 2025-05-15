<?php

/**
 * Accordion component
 *
 * @package plc_2025
 */
if (!function_exists('plc_2025_accordion')) {
  /**
   * Render an accordion component
   *
   * @param array $args {
   *     Accordion arguments.
   *
   *     @type string  $title       Accordion header title.
   *     @type string  $content     Accordion body content.
   *     @type mixed   $icon        Icon (SVG markup, icon name, image ID, or URL).
   *     @type string  $icon_type   Type of icon: 'svg', 'image', 'file', 'url' (default: auto-detect).
   *     @type bool    $is_open     Whether accordion is initially open (default: false).
   *     @type string  $class       Additional CSS classes.
   *     @type array   $attributes  Additional HTML attributes as key => value pairs.
   *     @type bool    $echo        Whether to echo the component (default: true).
   * }
   * @return string HTML output if $echo is false.
   */
  function plc_2025_accordion($args = [])
  {
    // Default arguments
    $defaults = [
      'title'       => '',
      'content'     => '',
      'icon'        => 'plus',
      'icon_type'   => '',  // Auto-detect by default
      'is_open'     => false,
      'class'       => '',
      'attributes'  => [],
      'echo'        => true,
    ];

    // Parse arguments
    $args = wp_parse_args($args, $defaults);

    // Build class list
    $classes = ['accordion'];

    // Add open class if accordion is initially open
    if ($args['is_open']) {
      $classes[] = 'accordion--open';
    }

    // Add custom classes
    if (!empty($args['class'])) {
      $classes = array_merge($classes, explode(' ', $args['class']));
    }

    // Create class string
    $class_string = esc_attr(implode(' ', $classes));

    // Build attributes
    $attr_string = '';
    foreach ($args['attributes'] as $key => $value) {
      $attr_string .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }

    // Get icon markup
    $icon_markup = '';
    if (!empty($args['icon'])) {
      // If icon_type is not specified, try to auto-detect
      $icon_type = $args['icon_type'];
      if (empty($icon_type)) {
        if (strpos($args['icon'], '<svg') === 0) {
          $icon_type = 'svg';
        } elseif (is_numeric($args['icon'])) {
          $icon_type = 'image'; // Assuming a numeric value is an attachment ID (from ACF)
        } elseif (filter_var($args['icon'], FILTER_VALIDATE_URL)) {
          $icon_type = 'url';
        } else {
          $icon_type = 'file'; // Default to file name
        }
      }

      // Generate markup based on icon type
      switch ($icon_type) {
        case 'svg':
          // It's already SVG markup
          $icon_markup = $args['icon'];
          break;

        case 'image':
          // It's an attachment ID (likely from ACF)
          $image_id = $args['icon'];
          $image_size = 'thumbnail'; // You can customize this
          $image = wp_get_attachment_image($image_id, $image_size, false, ['class' => 'accordion__title-icon-image']);
          if ($image) {
            $icon_markup = $image;
          }
          break;

        case 'url':
          // It's a direct URL to an image
          $icon_markup = '<img src="' . esc_url($args['icon']) . '" alt="" class="accordion__title-icon-image" />';
          break;

        case 'file':
        default:
          // It's a file name, try to load the SVG file
          $icon_path = get_template_directory() . '/assets/images/icons/' . $args['icon'] . '.svg';
          if (file_exists($icon_path)) {
            $icon_markup = file_get_contents($icon_path);
          }
          break;
      }
    }

    // Get chevron icon (this will always be a file)
    $chevron_path = get_template_directory() . '/assets/images/icons/chevron-down.svg';
    $chevron_markup = '';
    if (file_exists($chevron_path)) {
      $chevron_markup = file_get_contents($chevron_path);
    }

    // Generate a unique ID for ARIA attributes
    $accordion_id = 'accordion-' . wp_unique_id();
    $header_id = 'accordion-header-' . wp_unique_id();
    $content_id = 'accordion-content-' . wp_unique_id();

    // Start building the HTML
    $html = '';
    $html .= '<div class="' . $class_string . '"' . $attr_string . ' id="' . esc_attr($accordion_id) . '">';

    // Add header with BEM class
    $html .= '<div class="accordion__header" id="' . esc_attr($header_id) . '">';
    $html .= '<button class="accordion__toggle" aria-expanded="' . ($args['is_open'] ? 'true' : 'false') . '" aria-controls="' . esc_attr($content_id) . '">';

    // Add title with icon to the left
    $html .= '<div class="accordion__title-wrapper">';

    // Add icon with title-icon class (for the left side)
    if (!empty($icon_markup)) {
      $html .= '<span class="accordion__title-icon">' . $icon_markup . '</span>';
    }

    // Add title
    if (!empty($args['title'])) {
      $html .= '<span class="accordion__title">' . wp_kses_post($args['title']) . '</span>';
    }

    $html .= '</div>'; // Close title wrapper

    // Add chevron icon on the right
    if (!empty($chevron_markup)) {
      $html .= '<span class="accordion__chevron">' . $chevron_markup . '</span>';
    }

    $html .= '</button>';
    $html .= '</div>'; // Close header

    // Add body with BEM class
    $html .= '<div id="' . esc_attr($content_id) . '" class="accordion__body" aria-labelledby="' . esc_attr($header_id) . '" ' . ($args['is_open'] ? '' : 'hidden') . '>';
    $html .= '<div class="accordion__content">';
    $html .= wp_kses_post($args['content']);
    $html .= '</div>'; // Close content
    $html .= '</div>'; // Close body

    $html .= '</div>'; // Close accordion

    // Output or return
    if ($args['echo']) {
      echo $html;
      return '';
    } else {
      return $html;
    }
  }
}

/**
 * Accordion Group component
 *
 * @package plc_2025
 */
if (!function_exists('plc_2025_accordion_group')) {
  /**
   * Render a group of accordions
   *
   * @param array $args {
   *     Accordion group arguments.
   *
   *     @type array   $items        Array of accordion items.
   *     @type bool    $single_open  Whether only one accordion can be open at a time (default: true).
   *     @type string  $class        Additional CSS classes.
   *     @type array   $attributes   Additional HTML attributes as key => value pairs.
   *     @type bool    $echo         Whether to echo the component (default: true).
   * }
   * @return string HTML output if $echo is false.
   */
  function plc_2025_accordion_group($args = [])
  {
    // Default arguments
    $defaults = [
      'items'       => [],
      'single_open' => true,
      'class'       => '',
      'attributes'  => [],
      'echo'        => true,
    ];

    // Parse arguments
    $args = wp_parse_args($args, $defaults);

    // Build class list
    $classes = ['accordion-group'];

    // Add custom classes
    if (!empty($args['class'])) {
      $classes = array_merge($classes, explode(' ', $args['class']));
    }

    // Create class string
    $class_string = esc_attr(implode(' ', $classes));

    // Build attributes
    $attr_string = '';
    if ($args['single_open']) {
      $attr_string .= ' data-accordion-single-open="true"';
    }
    foreach ($args['attributes'] as $key => $value) {
      $attr_string .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }

    // Start building the HTML
    $html = '';
    $html .= '<div class="' . $class_string . '"' . $attr_string . '>';

    // Add individual accordions
    if (!empty($args['items']) && is_array($args['items'])) {
      foreach ($args['items'] as $item) {
        $html .= plc_2025_accordion(array_merge($item, ['echo' => false]));
      }
    }

    $html .= '</div>'; // Close accordion group

    // Output or return
    if ($args['echo']) {
      echo $html;
      return '';
    } else {
      return $html;
    }
  }
}
