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
   *     @type string  $size        Button size (small or default).
   *     @type string  $icon        Icon name (like 'book') or full SVG markup.
   *     @type string  $hover_icon  Icon name or SVG markup to show on hover (replaces main icon).
   *     @type string  $icon_position Whether to position the icon at the 'start' or 'end' (default: 'end').
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
      'size'          => '',  // Default size has no modifier
      'icon'          => '',
      'hover_icon'    => '',  // New parameter for hover icon
      'icon_position' => 'end', // Default position is at the end
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
    // Add size class if small
    if ($args['size'] === 'small') {
      $classes[] = 'btn--small';
    }
    // Add icon class if icon is present
    if (!empty($args['icon'])) {
      $classes[] = 'btn--has-icon';
      // Add position-specific class
      $classes[] = 'btn--icon-' . $args['icon_position'];
    }
    // Add hover icon class if hover icon is present
    if (!empty($args['hover_icon'])) {
      $classes[] = 'btn--has-hover-icon';
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

    // Prepare icon markup if needed
    $icon_html = '';
    if (!empty($args['icon'])) {
      // Check if we have a hover icon
      if (!empty($args['hover_icon'])) {
        // Use container with both icons for hover effect
        $icon_html .= '<span class="btn__icon-container">';

        // Default icon (always visible by default, hidden on hover)
        $icon_markup = get_icon_markup($args['icon']);
        $icon_html .= '<span class="btn__icon btn__icon--default">' . $icon_markup . '</span>';

        // Hover icon (hidden by default, visible on hover)
        $hover_icon_markup = get_icon_markup($args['hover_icon']);
        $icon_html .= '<span class="btn__icon btn__icon--hover">' . $hover_icon_markup . '</span>';

        $icon_html .= '</span>'; // Close icon container
      } else {
        // Regular icon with no hover effect
        $icon_markup = get_icon_markup($args['icon']);
        $icon_html .= '<span class="btn__icon">' . $icon_markup . '</span>';
      }
    }

    // Add icon at start if position is 'start'
    if (!empty($args['icon']) && $args['icon_position'] === 'start') {
      $html .= $icon_html;
    }

    // Add text with BEM class
    if (!empty($args['text'])) {
      $html .= '<span class="btn__text">' . esc_html($args['text']) . '</span>';
    }

    // Add icon at end if position is 'end'
    if (!empty($args['icon']) && $args['icon_position'] === 'end') {
      $html .= $icon_html;
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

  /**
   * Helper function to get icon markup from name or SVG
   *
   * @param string $icon Icon name or SVG markup
   * @return string SVG markup
   */
  function get_icon_markup($icon)
  {
    $icon_markup = '';
    // Check if the icon is an SVG markup or a file name
    if (strpos($icon, '<svg') === 0) {
      // It's already SVG markup
      $icon_markup = $icon;
    } else {
      // It's a file name, try to load the SVG file
      $icon_path = get_template_directory() . '/assets/images/icons/' . $icon . '.svg';
      if (file_exists($icon_path)) {
        $icon_markup = file_get_contents($icon_path);
      }
    }
    return $icon_markup;
  }
}
