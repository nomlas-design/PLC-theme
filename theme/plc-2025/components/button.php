<?php

/**
 * Button component
 *
 * @package plc_2025
 */
if (!function_exists('plc_2025_button')) {
  /**
   * Render a button component
   *
   * @param array $args {
   *     Button arguments.
   *
   *     @type string  $text        Button text.
   *     @type string  $url         URL for the button (makes it an <a> element).
   *     @type string  $type        Button type when not a link (default: 'button').
   *     @type string  $variant     Button style variant (primary, secondary, transparent).
   *     @type string  $icon        Icon name (like 'book') or full SVG markup.
   *     @type string  $class       Additional CSS classes.
   *     @type array   $attributes  Additional HTML attributes as key => value pairs.
   *     @type bool    $echo        Whether to echo the button (default: true).
   * }
   * @return string HTML output if $echo is false.
   */
  function plc_2025_button($args = [])
  {
    // Default arguments
    $defaults = [
      'text'          => '',
      'url'           => '',
      'type'          => 'button',
      'variant'       => '',  // Default/primary has no modifier
      'icon'          => '',
      'class'         => '',
      'attributes'    => [],
      'echo'          => true,
    ];

    // Parse arguments
    $args = wp_parse_args($args, $defaults);

    // Build class list
    $classes = ['btn'];

    // Add variant class using BEM naming (btn--secondary, btn--transparent)
    if (in_array($args['variant'], ['secondary', 'transparent'])) {
      $classes[] = 'btn--' . $args['variant'];
    }

    // Add icon class if icon is present
    if (!empty($args['icon'])) {
      $classes[] = 'btn--has-icon';
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

    // Determine if this is a link or button
    $is_link = !empty($args['url']);

    // Start building the HTML
    $html = '';

    if ($is_link) {
      $html .= '<a href="' . esc_url($args['url']) . '" class="' . $class_string . '"' . $attr_string . '>';
    } else {
      $html .= '<button type="' . esc_attr($args['type']) . '" class="' . $class_string . '"' . $attr_string . '>';
    }

    // Add text with BEM class
    if (!empty($args['text'])) {
      $html .= '<span class="btn__text">' . esc_html($args['text']) . '</span>';
    }

    // Add icon after text with BEM class
    if (!empty($args['icon'])) {
      $icon_markup = '';

      // Check if the icon is an SVG markup or a file name
      if (strpos($args['icon'], '<svg') === 0) {
        // It's already SVG markup
        $icon_markup = $args['icon'];
      } else {
        // It's a file name, try to load the SVG file
        $icon_path = get_template_directory() . '/assets/images/icons/' . $args['icon'] . '.svg';

        if (file_exists($icon_path)) {
          $icon_markup = file_get_contents($icon_path);
        }
      }

      $html .= '<span class="btn__icon">' . $icon_markup . '</span>';
    }

    // Close the tag
    $html .= $is_link ? '</a>' : '</button>';

    // Output or return
    if ($args['echo']) {
      echo $html;
      return '';
    } else {
      return $html;
    }
  }
}
