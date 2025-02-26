<?php

/**
 * Template part for hero slider
 *
 * @package PLC_theme
 */

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


$slider_posts = new WP_Query($args);
$slides = array();

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

  <div class="hero">
    <?php foreach ($slides as $post) :
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
        <div class="hero__slide"
          style='background-image: url("<?php echo esc_url($image['url']); ?>")'
          data-hierarchy="<?php echo esc_attr($hierarchy); ?>">

        </div>
        <div class='container container--hero'>
          <div class='hero__content'>
            <div class='hero__heading'>
              <h1>
                Expert Guidance for Public Land Management
              </h1>
              <p>
                Delivering practical advice through specialised training, governance solutions, and professional development to support sustainable public land management.
              </p>
              <div class='h-span'>
                <?php
                plc_2025_button([
                  'text'    => 'View Courses',
                  'url'     => '/courses',
                  'variant' => 'primary',
                  'icon'   => 'book'
                ]);
                ?>
                <?php
                plc_2025_button([
                  'text'    => 'Book a Consultation',
                  'url'     => '/consultancy-services',
                  'variant' => 'secondary',
                  'icon'   => 'arrow-right'
                ]);
                ?>
              </div>
            </div>
            <div class='hero__slide__info'>
              <div class='hero__slide__nav'>
                <button>
                  <img class='hero__slide__icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrow-left.svg" alt="Next" />
                </button>
                <div class='hero__slide__loc'>
                  <span class='hero__slide__number'>1</span>
                  <span>of</span>
                  <span class='hero__slide__number'>3</span>
                </div>
                <button>
                  <img class=' hero__slide__icon' src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/arrow-right.svg" alt="Next" />
                </button>
              </div>
              <span class='hero__title'><?php echo esc_html($title); ?></span>
              <?php if ($client) : ?>
                <span class='hero__client'><?php echo esc_html($client); ?></span>
              <?php endif; ?>
              <?php if ($issue) : ?>
                <span class='hero__issue'><?php echo esc_html($issue); ?></span>
              <?php endif; ?>
            </div>

          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php
  // Restore original post data
  wp_reset_postdata();

endif; ?>