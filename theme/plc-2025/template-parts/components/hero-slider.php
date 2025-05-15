<?php

/**
 * Template part for hero slider using Splide carousel
 * With slide details integrated into each slide
 *
 * @package PLC_theme
 */

/**
 * Hero Slider Component
 * 
 * @param array $args {
 *     Optional. Arguments to customize the hero component.
 *     
 *     @type string $title        The main heading text (required).
 *     @type string $content      Optional content - can include paragraphs, buttons, or any HTML.
 *     @type string $custom_class Additional CSS classes to add to hero container.
 * }
 */
$hero_args = wp_parse_args(
  $args ?? [],
  array(
    'title'        => 'Expert Guidance for Public Land Management',
    'content'      => '',
    'custom_class' => '',
  )
);

// Custom sorting function for hierarchy
function sort_by_hierarchy_and_date($a, $b)
{
  $a_hierarchy = get_field('hierarchy', $a->ID);
  $b_hierarchy = get_field('hierarchy', $b->ID);

  // If both have hierarchy values
  if ('' !== $a_hierarchy && '' !== $b_hierarchy) {
    return $a_hierarchy - $b_hierarchy; // Ascending numeric sort
  }

  // If only first has hierarchy, it comes first
  if ('' !== $a_hierarchy && '' === $b_hierarchy) {
    return -1;
  }

  // If only second has hierarchy, it comes first
  if ('' === $a_hierarchy && '' !== $b_hierarchy) {
    return 1;
  }

  // If neither has hierarchy, sort by date descending
  return strtotime($b->post_date) - strtotime($a->post_date);
}

// Query arguments
$args = array(
  'post_type'      => 'plc_hero',
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'DESC',
);

// Get posts
$slider_posts = new WP_Query($args);
$slides = array();

// Collect posts
if ($slider_posts->have_posts()) {
  while ($slider_posts->have_posts()) {
    $slider_posts->the_post();
    $slides[] = $slider_posts->post;
  }

  // Custom sort
  usort($slides, 'sort_by_hierarchy_and_date');
}

// Check if we have posts
if (! empty($slides)) : ?>

  <main>
    <div class="hero <?php echo esc_attr($hero_args['custom_class']); ?>">
      <div class='container container--hero'>
        <div class='hero__content'>
          <div class='hero__heading'>
            <?php if (!empty($hero_args['title'])) : ?>
              <h1>
                <?php echo wp_kses_post($hero_args['title']); ?>
              </h1>
            <?php else : ?>
              <h1>
                <?php echo the_title(); ?>
              </h1>
            <?php endif; ?>
            <?php if (!empty($hero_args['content'])) : ?>
              <?php
              // Use raw content to allow SVGs to render properly
              echo $hero_args['content'];
              ?>
            <?php endif; ?>
          </div>
        </div>
        <div class='splide-wrapper'>
          <div class='splide-inner'>
            <div class="splide" id="hero-slider">
              <div class="splide__track">
                <ul class="splide__list">
                  <?php foreach ($slides as $index => $post) :
                    setup_postdata($post);

                    // Get ACF fields
                    $image = get_field('image');
                    $client = get_field('client');
                    $issue = get_field('issue');
                    $hierarchy = get_field('hierarchy');

                    // Get post title
                    $title = get_the_title();
                  ?>
                    <?php if ($image) : ?>
                      <li class="splide__slide">
                        <div class="hero__slide">
                          <img data-splide-lazy="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="hero__slide__image" />
                          <div class="hero__slide__info">
                            <span class='hero__title'><?php echo esc_html($title); ?></span>
                            <?php if ($client) : ?>
                              <span class='hero__client'><?php echo esc_html($client); ?></span>
                            <?php endif; ?>
                            <?php if ($issue) : ?>
                              <span class='hero__issue'><?php echo esc_html($issue); ?></span>
                            <?php endif; ?>
                          </div>
                        </div>
                      </li>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  <?php
  // Restore original post data
  wp_reset_postdata();

endif; ?>