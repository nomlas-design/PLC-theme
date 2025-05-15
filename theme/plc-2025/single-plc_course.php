<?php

/**
 * Template Name: Single Course
 *
 * @package plc_2025
 */

get_header();

// get acf fields
$title = get_field(selector: 'title');
$format = get_field('format');
$overview = get_field('overview');
$image = get_field('image');
$details = get_field('details');

$presenters = get_field('presenter');

if ($presenters) {
  // If not an array, make it an array for consistency
  if (!is_array($presenters)) {
    $presenters = [$presenters];
  }
  foreach ($presenters as $presenter) {
    // Get presenter ID
    $pid = is_object($presenter) ? $presenter->ID : $presenter;
    $presenter_data[] = [
      'name'     => get_the_title($pid),
      'title'    => get_field('title', $pid),
      'portrait' => get_field('portrait', $pid),
      'bio'      => get_field('bio', $pid),
    ];
  }
}


// Schedules

$course_id = get_the_ID();

// Query schedules that link to this course
$schedule_query = new WP_Query([
  'post_type' => 'plc_schedule',
  'posts_per_page' => -1,
  'meta_query' => [
    [
      'key' => 'course',
      'value' => $course_id,
      'compare' => '='
    ]
  ],
  'meta_key' => 'first_session_date',
  'orderby'  => 'meta_value',
  'order'    => 'ASC'
]);

$schedules = [];
if ($schedule_query->have_posts()) {
  while ($schedule_query->have_posts()) {
    $schedule_query->the_post();
    $schedules[] = [
      'price'   => get_field('price'),
      'sessions' => get_field('session'), // This will be an array (repeater)
    ];
  }
  wp_reset_postdata();
}

$schedule_count = $schedule_query->found_posts;

?>
<main>
  <section class='section section--first'>
    <div class='container container--course'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href='/courses'>Courses</a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <?php if ($title) : ?>
          <span class='breadcrumbs__active'>
            <?php the_title(); ?>
          </span>
        <?php endif; ?>
      </div>
      <div class='grid-course'>
        <div class='grid-course__sidebar'>
          <div class='grid-course__img'>
            <?php if (!empty($presenter_data)): ?>
              <div class='details-course__presenter'>
                <div class='details-course__presenter__heading'>
                  <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/person.svg' alt='Presenter' />
                  <h3>Meet Your Presenter<?php echo count($presenter_data) > 1 ? 's' : ''; ?></h3>
                </div>
                <?php foreach ($presenter_data as $presenter): ?>
                  <div class='details-course__presenter__content'>
                    <?php if (!empty($presenter['portrait']['url'])): ?>
                      <img class='details-course__presenter__img'
                        src='<?php echo esc_url($presenter['portrait']['url']); ?>'
                        alt='<?php echo esc_attr($presenter['name']); ?>' />
                    <?php endif; ?>
                    <div class='details-course__presenter__text'>
                      <?php if (!empty($presenter['name'])): ?>
                        <h4 class='details-course__presenter__text__header'>
                          <?php echo esc_html($presenter['name']); ?>
                        </h4>
                      <?php endif; ?>
                      <?php if (!empty($presenter['title'])): ?>
                        <p class='details-course__presenter__text__subheader'>
                          <?php echo esc_html($presenter['title']); ?>
                        </p>
                      <?php endif; ?>
                      <?php if (!empty($presenter['bio'])): ?>
                        <p class='details-course__presenter__text__body'>
                          <?php echo wp_kses_post($presenter['bio']); ?>
                        </p>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>


            <?php if (!empty($image['url'])): ?>
              <img class='grid-course__img__thumb'
                src='<?php echo esc_url($image['url']); ?>'
                alt='<?php echo esc_attr($image['alt'] ?? $title ?? 'Course image'); ?>' />
            <?php endif ?>

          </div>
          <div class='grid-course__notes'>
            If you have any questions regarding the course, please contact our Training Courses Manager, Fiona Sellars:
            <div class='grid-course__notes__contact'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--orange.svg' alt='Email' />
              <a href='mailto:fiona@publicland.com.au'>
                fiona@publicland.com.au
              </a>
            </div>
            <div class='grid-course__notes__contact'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--orange.svg' alt='Email' />
              <a href='tel:0395345128'>
                (03) 9534 5128
              </a>
            </div>
          </div>
        </div>
        <div class='grid-course__content'>
          <div class='grid-course__header'>
            <div class='header__content'>
              <h2>Course Overview</h2>
              <h1><?php the_title(); ?></h1>
              <p>A 2 session online course for staff of councils and government authorities dealing with real property. It covers all the mechanisms by which the public interest may coexist with private property rights - including easements, covenants, statutory agreements, and conditional Crown grants.</p>
            </div>
            <div class='share-btn-wrapper'>
              <div class='share-popup'>Link copied!</div>
              <?php echo plc_2025_button([
                'text'    => 'Share Course',
                'url'     => null,
                'variant' => 'secondary',
                'class'   => 'share-btn',
                'icon'    => 'share--orange',
                'hover_icon' => 'share--white',
                'size'    => 'small',
                'echo' => false,
              ]) ?>
            </div>
          </div>
          <?php if ($schedule_query->have_posts()): ?>
            <?php while ($schedule_query->have_posts()): $schedule_query->the_post(); ?>
              <?php
              $price = get_field('price');
              $sessions = get_field('session');
              ?>
              <div class='grid-course__2-col'>
                <div class='grid-course__schedule'>
                  <div class='grid-course__schedule__heading'>
                    <img class='grid-course__schedule__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Calendar' />
                    <h3>
                      Course Schedule
                    </h3>
                  </div>
                  <?php if (!empty($sessions)): ?>
                    <?php foreach ($sessions as $i => $session): ?>

                      <div class='grid-course__schedule__item'>
                        <span class='grid-course__schedule__item__header'>Session <?php echo $i + 1; ?></span>
                        <div class='grid-course__schedule__item__wrap'>
                          <div class='grid-course__schedule__item__span'>
                            <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                            <span>
                              <?php
                              if (!empty($session['date'])) {
                                $date_obj = DateTime::createFromFormat('Ymd', $session['date']);
                                echo $date_obj ? esc_html($date_obj->format('D, j F')) : esc_html($session['date']);
                              }
                              ?>
                            </span>
                          </div>
                          <div class='grid-course__schedule__item__span'>
                            <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                            <span>
                              <?php
                              echo esc_html($session['start'] ?? '') . ' - ' . esc_html($session['end'] ?? '');
                              ?>
                            </span>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
                <div class='grid-course__cta'>
                  <div class='grid-course__cta__price'>
                    <span class='grid-course__cta__price__label'>
                      <?php
                      echo $price
                        ? esc_html('$' . number_format((float)$price, 0))

                        : 'Free';
                      ?>
                    </span>
                    <?php if ($price > 0): ?>
                      <span class='grid-course__cta__price__sublabel'>Including GST and course notes</span>
                    <?php endif ?>
                  </div>
                  <?php
                  $schedule_id = get_the_ID();
                  $booking_url = add_query_arg('schedule_id', $schedule_id, '/booking-form');
                  ?>
                  <?php echo plc_2025_button([
                    'text'    => 'Register Now',
                    'url'     => $booking_url,
                    'variant' => 'primary',
                    'icon'    => 'arrow-right',
                    'size'    => 'large',
                    'echo' => false,
                  ]); ?>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata(); ?>
          <?php else: ?>
            <!-- No schedules attached: add your fallback block here -->
            <div class='grid-course__2-col'>
              <div class='grid-course__schedule--empty'>
                <p><strong>No upcoming schedules for this course.</strong>
                <p>
                  <?php echo plc_2025_button([
                    'text'    => 'Join the Waitlist',
                    'url'     => 'mailto:fiona@publicland.com.au',
                    'variant' => 'primary',
                    'icon'    => 'arrow-right',
                    'size'    => 'small',
                    'echo' => false,
                  ]); ?>
              </div>
            </div>
          <?php endif; ?>
          <?php
          $text = '<div class="details-course__content__session">
            <h4 class="details-course__content__session-title">Session 1</h4>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">Refresher: Basic Property Law</h5>
              <ul class="details-course__content__list">
                <li>Crown land and Freehold land</li>
                <li>Old Law and Torrens title freehold</li>
                <li>Fee-simple and indefeasibility of title</li>
                <li>Common law and Statutory law</li>
                <li>Interests in land</li>
              </ul>
            </div>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">Crown Land Restrictions</h5>
              <ul class="details-course__content__list">
                <li>The Reservation of Crown land</li>
                <li>Conditional Crown Grants</li>
                <li>Easement-like provisions on Crown land</li>
              </ul>
            </div>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">Easements – the Basics</h5>
              <ul class="details-course__content__list">
                <li>The purpose of easements</li>
                <li>Positive and negative easements</li>
                <li>Easements in Common law; easements in Gross</li>
                <li>Creation by subdivision; by acquisition</li>
              </ul>
            </div>
          </div>

          <div class="details-course__content__session">
            <h4 class="details-course__content__session-title">Session 2</h4>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">More about Easements</h5>
              <ul class="details-course__content__list">
                <li>Implied and prescriptive easements</li>
                <li>Recording and registering easements</li>
                <li>Removal, extinguishment, and abandonment of easements</li>
              </ul>
            </div>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">Covenants</h5>
              <ul class="details-course__content__list">
                <li>The purpose of covenants</li>
                <li>Statutory agreements and restrictions</li>
                <li>Restrictive and positive covenants</li>
                <li>Removal of covenants under planning law</li>
                <li>Provisions of the Property Law Act 1958</li>
                <li>Proposed changes to Restrictive Covenants by Subdivision</li>
              </ul>
            </div>

            <div class="details-course__content__topic">
              <h5 class="details-course__content__topic-title">Statutory Agreements</h5>
              <ul class="details-course__content__list">
                <li>Sec 173, Planning & Environment Act 1987</li>
                <li>Sec 69, Conservation Forests and Lands Act 1987</li>
                <li>Trust for Nature covenants</li>
                <li>Heritage Act covenants</li>
              </ul>
            </div>
          </div>';
          $accordion_items[] = [
            'title'     => 'Course Content',
            'content'   => $details,
            'icon'      => $icon_value,
            'icon_type' => 'url'  // Explicitly set the type since we're using the URL
          ];
          plc_2025_accordion_group([
            'items' => $accordion_items,
            'single_open' => true
          ]);
          ?>

        </div>
      </div>

  </section>

</main>

<?php
get_footer();
?>