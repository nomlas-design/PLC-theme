<?php
/*
  Template Name: Booking Layout
  */


get_header();

$schedule_id = isset($_GET['schedule_id']) ? intval($_GET['schedule_id']) : 0;


if ($schedule_id) {
  // Schedule post fields
  echo "<!-- Schedule ID: $schedule_id -->";
  $schedule_title = get_the_title($schedule_id);
  $sessions = get_field('session', $schedule_id);   // Array of sessions
  $cost = get_field('price', $schedule_id);

  // Get attached course (ACF Post Object field)
  $attached_course = get_field('course', $schedule_id); // Should be post ID or WP_Post
  if (is_array($attached_course) && isset($attached_course['ID'])) {
    $course_id = $attached_course['ID'];
  } elseif (is_object($attached_course) && isset($attached_course->ID)) {
    $course_id = $attached_course->ID;
  } else {
    $course_id = intval($attached_course); // If it's just the ID
  }

  $course_title = $course_intro = '';
  if ($course_id) {
    $course_title = get_the_title($course_id);
    $course_url = get_permalink($course_id);
    $course_intro = get_field('intro', $course_id);
  }
}

?>

<main>
  <section class='section section--first'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href='/courses'>Courses</a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href="<?php echo esc_url($course_url); ?>"> <?php echo esc_html($course_title) ?></a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Booking Form</span>
      </div>

      <div class='grid grid--2-col'>
        <div class='booking-form'>
          <div class='schedule__header__hidden'>
            <?php if ($schedule_id) : ?>
              <?php echo esc_html($schedule_title) ?>
            <?php endif; ?>
          </div>
          <h1>Booking Form</h1>

          <?php echo do_shortcode('[contact-form-7 id="ae00520" title="Booking Form"]') ?>


        </div>
        <div class='booking-form__success'>
          <h2>Success!</h2>
          <p>Thank you for your booking. We will be in touch shortly to confirm your place and payment details.</p>
          <p>If you have any questions, please contact our Traing Course Manager, Fiona Sellars:</p>
          <div class='book-form__sucess__footer'>
            <div class='booking-form__notes__contact'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--orange.svg' alt='Email' />
              <a href='mailto:fiona@publicland.com.au'>
                fiona@publicland.com.au
              </a>
            </div>
            <div class='booking-form__notes__contact'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--orange.svg' alt='Email' />
              <a href='tel:0395345128'>
                (03) 9534 5128
              </a>
            </div>
          </div>
          <?php echo plc_2025_button([
            'text'    => 'Back to Courses',
            'url'     => '/courses',
            'variant' => 'secondary',
            'size'    => 'large',
            'echo' => false,
          ]) ?>
        </div>
        <div class='content content--start'>
          <div class='booking-form__details'>
            <div class='booking-form__schedule'>
              <div class='booking-form__schedule__content'>
                <h2 class='booking-form__schedule__header'><?php echo esc_html($course_title) ?></h2>
                <p><?php echo esc_html($course_intro) ?></p>
              </div>
              <?php if (!empty($sessions)): ?>
                <?php
                $num_sessions = count($sessions);
                ?>
                <?php foreach ($sessions as $i => $session): ?>

                  <div class='booking-form__schedule__item'>
                    <div class='booking-form__schedule__item__header'>
                      <?php if ($num_sessions > 1): ?>
                        Session <?php echo $i + 1; ?>
                      <?php endif; ?>
                      </span>
                      <div class='booking-form__schedule__item__wrap'>
                        <div class='booking-form__schedule__item__span'>
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
                        <div class='booking-form__schedule__item__span'>
                          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                          <span>
                            <?php
                            echo esc_html($session['start'] ?? '') . ' - ' . esc_html($session['end'] ?? '');
                            ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php endforeach; ?>
              <?php endif; ?>
              <div class='booking-form__cta'>
                <?php if ($cost > 0): ?>
                  <div class='booking-form__schedule__heading'>
                    <img class='booking-form__schedule__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/price.svg' alt='Calendar' />
                    <h3>Cost & Payment</h3>
                  </div>
                  <div class='booking-form__cta__price'>
                    <span class='booking-form__cta__price__label'>
                      <?php echo esc_html('$' . number_format((float)$cost, 2)); ?>
                    </span>
                    <span class='booking-form__cta__price__sublabel'>Including GST and course notes</span>
                  </div>
                  <p>Once we have confirmed your booking, payment can be made via credit card or direct debit.</p>

                <?php else : ?>
                  <p>Once we have confirmed your booking, you will receive a confirmation email.</p>
                <?php endif; ?>
              </div>
              <div class='booking-form__notes'>
                If you have any questions regarding the course or payment, please contact our Training Courses Manager, Fiona Sellars:
                <div class='booking-form__notes__contact'>
                  <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--orange.svg' alt='Email' />
                  <a href='mailto:fiona@publicland.com.au'>
                    fiona@publicland.com.au
                  </a>
                </div>
                <div class='booking-form__notes__contact'>
                  <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--orange.svg' alt='Email' />
                  <a href='tel:0395345128'>
                    (03) 9534 5128
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  </section>
</main>
<?php get_footer(); ?>