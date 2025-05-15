<?php
get_header(); ?>

<?php
// Get the hero ACF fields

$title = get_field('title');
$intro = get_field('intro');
?>
<?php get_template_part('template-parts/components/hero-slider', null, [
  'title' => $title,
  'content' => '<p>' . $intro . '</p>
                  <div class="h-span">
                    ' . plc_2025_button([
    'text'    => 'View Courses',
    'url'     => '/courses',
    'variant' => 'primary',
    'icon'    => 'book',
    'echo' => false,

  ]) . '
                    ' . plc_2025_button([
    'text'    => 'Book a Consultation',
    'url'     => '/consultancy-services',
    'variant' => 'secondary',
    'icon'    => 'arrow-right--orange',
    'hover_icon' => 'arrow-right',
    'echo' => false,
  ]) . '
                  </div>',
  'custom_class' => 'home-hero',
]); ?>
<main>

  <section class='section section--half-bg section--reduced'>
    <div class='container container--flex'>
      <div class='grid grid--events-col '>
        <div class='content content--stretch '>
          <div class='header__content'>
            <h2>Our free monthly event</h2>
            <h1>Lunchtime Conversations</h1>
            <p class='text-lg'>
              Join us on-line on the second Tuesday of every month from 12 noon to 12.45pm for a lively, interactive, casual chat all about different topics relating to Public Land. 
            </p>
            <?php echo plc_2025_button([
              'text'    => 'View All Events',
              'url'     => '/events',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>
          </div>

        </div>
        <div class='content content--stretch content--reduced content--relative '>

          <div data-type='free' data-open='open' data-alpha='lunchtime-conversations' data-data='11-03-2025' class='courses-child section--half-bg__content'>
            <div class='courses-child__img'>

              <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conversations-latest.jpg' alt='Placeholder' />
            </div>
            <div class='courses-child__content'>
              <div class='courses-child__text'>
                <h3 class='courses-child__title'>This Month's Topic:</h3>
                <p class='courses-child__description'>
                  Roads May Serve Non-Road Purpose.
                </p>
              </div>
              <div class='courses-child__presenter'>
                <img class='courses-child__presenter__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/headshot-placeholder.png' alt='Presenter' />
                <span>Introduced by: <strong>David Gabriel-Jones</strong></span>
              </div>
              <div class='courses-child__schedule'>

                <div class='courses-child__schedule__list'>
                  <div class='courses-child__schedule__item'>
                    <div class='courses-child__schedule__item__span'>
                      <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                      <span> Tue, 11 March
                      </span>
                    </div>
                    <div class='courses-child__schedule__item__span'>
                      <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                      <span>12:00 PM - 1:00 PM</span>
                    </div>
                  </div>

                </div>

              </div>
            </div>
            <div class='courses-child__cta'>
              <?php echo plc_2025_button([
                'text'    => 'Register Now',
                'url'     => '/',
                'variant' => 'primary',
                'icon'    => 'arrow-right',
                'size'    => 'small',
                'echo' => false,
              ]) ?>

            </div>
          </div>

        </div>
  </section>
  <section class='section section--last'>
    <div class='container'>
      <div class='grid grid--2-col grid--gap'>
        <div class='content'>
          <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Placeholder' />
        </div>
        <div class='content'>
          <div class='content content--accordion'>
            <?php if (have_rows('expertise')): ?>
              <?php while (have_rows('expertise')): the_row(); ?>
                <div class='content__heading'>
                  <h2><?php the_sub_field('heading'); ?></h2>
                  <p><?php the_sub_field('text'); ?></p>
                </div>
                <?php
                if (have_rows('accordion')):
                  $accordion_items = [];
                  while (have_rows('accordion')): the_row();
                    $icon = get_sub_field('icon');
                    $icon_value = '';

                    // Process icon based on what ACF returns
                    if (is_array($icon) && isset($icon['url'])) {
                      // It's an ACF image object, use the URL
                      $icon_value = $icon['url'];
                    } else {
                      // Use whatever value we got
                      $icon_value = $icon;
                    }

                    $accordion_items[] = [
                      'title'     => get_sub_field('heading'),
                      'content'   => get_sub_field('text'),
                      'icon'      => $icon_value,
                      'icon_type' => 'url'  // Explicitly set the type since we're using the URL
                    ];
                  endwhile;

                  // Check if the function exists before calling it
                  if (function_exists('plc_2025_accordion_group')) {
                    plc_2025_accordion_group([
                      'items' => $accordion_items,
                      'single_open' => true
                    ]);
                  }
                endif;
                ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class='content'>
          <div class='content content--accordion'>
            <?php if (have_rows('expertise')): ?>
              <?php while (have_rows('expertise')): the_row(); ?>
                <div class='content__heading'>
                  <h2><?php the_sub_field('heading'); ?></h2>
                  <p><?php the_sub_field('text'); ?></p>
                </div>
                <?php
                if (have_rows('accordion')):
                  $accordion_items = [];
                  while (have_rows('accordion')): the_row();
                    $icon = get_sub_field('icon');
                    $icon_value = '';

                    // Process icon based on what ACF returns
                    if (is_array($icon) && isset($icon['url'])) {
                      // It's an ACF image object, use the URL
                      $icon_value = $icon['url'];
                    } else {
                      // Use whatever value we got
                      $icon_value = $icon;
                    }

                    $accordion_items[] = [
                      'title'     => get_sub_field('heading'),
                      'content'   => get_sub_field('text'),
                      'icon'      => $icon_value,
                      'icon_type' => 'url'  // Explicitly set the type since we're using the URL
                    ];
                  endwhile;

                  // Check if the function exists before calling it
                  if (function_exists('plc_2025_accordion_group')) {
                    plc_2025_accordion_group([
                      'items' => $accordion_items,
                      'single_open' => true
                    ]);
                  }
                endif;
                ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
        <div class='content'>
          <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Placeholder' />
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>