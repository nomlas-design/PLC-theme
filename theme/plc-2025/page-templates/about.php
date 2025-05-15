<?php
/*
  Template Name: About Layout
  */
get_header();


// Acf fields

$heading = get_field('heading');
$intro   = get_field('intro');

?>

<main>
  <section class='section section--first '>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>About Us</span>
      </div>
      <div class='content content--center'>
        <div class='header__content header__content--center'>
          <h2>About Us</h2>
          <h1><?php echo esc_html($heading) ?></h1>
          <p><?php echo esc_html($intro) ?></p>
          <span class='header__content__alt'>We believe in...</span>
        </div>
        <div class='grid grid--4-col'>
          <?php
          // Get the 'values' repeater (attached to this page)
          $principles = get_field('principles'); // Change 'values' to your repeater's actual field name if different

          if ($principles):
            foreach ($principles as $value):
              $title = $value['title'];   // Required
              $text  = $value['text'];    // Required
              $icon  = $value['icon'];    // Required (but fallback if not filled)

              $icon_url = !empty($icon['url'])
                ? esc_url($icon['url'])
                : get_template_directory_uri() . '/assets/images/icons/governance.svg';
          ?>
              <div class='values-card'>
                <img class='values-card__img' src='<?php echo $icon_url; ?>' alt=<?php echo esc_html($title) ?> />
                <div class='header__content'>
                  <h3><?php echo esc_html($title); ?></h3>
                  <p><?php echo esc_html($text); ?></p>
                </div>
              </div>
          <?php
            endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
  <section class='section section--bg section--img section--img--3'>
    <div class='container'>
      <div class='content content--center'>
        <div class='header__content header__content--center'>
          <h2>Our People</h2>
          <h1>Our People</h1>
          <p>Our team of experienced professionals specialises in all aspects of public land management and policy.</p>
        </div>
        <div class='grid grid--3-col'>
          <?php
          $staff_query = new WP_Query([
            'post_type'      => 'plc_staff',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
          ]);

          if ($staff_query->have_posts()):
            while ($staff_query->have_posts()): $staff_query->the_post();

              $title         = get_field('title');           // Required
              $intro         = get_field('intro');           // Optional
              $portrait      = get_field('portrait');        // Optional (ACF image)
              $email         = get_field('email');           // Required
              $qualifications = get_field('qualifications');  // Optional (WYSIWYG)

              // Use placeholder if no portrait image
              $portrait_url = !empty($portrait['url'])
                ? esc_url($portrait['url'])
                : get_template_directory_uri() . '/assets/images/placeholders/headshot-placeholder.png';

              // Use 'Principal' as a hardcoded role, or replace with a dynamic field if available
              $role = $title ? esc_html($title) : 'Staff';

              // Button url
              $mailto = $email ? 'mailto:' . antispambot($email) : '';
          ?>
              <div class='people-card'>
                <img class='people-card__img' src='<?php echo $portrait_url; ?>' alt='<?php echo esc_attr(get_the_title()); ?>' />
                <div class='people-card__content'>
                  <div class='people-card__header'>
                    <div class='people-card__vspan'>
                      <h4 class='people-card__heading'><?php echo esc_html(get_the_title()); ?></h4>
                      <span class='people-card__subheader'><?php echo $role; ?></span>
                    </div>
                    <?php
                    plc_2025_button([
                      'text'       => '',
                      'url'        => $mailto,
                      'variant'    => 'secondary',
                      'icon'       => 'email--orange',
                      'hover_icon' => 'email--white',
                      'echo'       => true,
                    ]);
                    ?>
                  </div>
                  <?php if ($intro): ?>
                    <p><?php echo esc_html($intro); ?></p>
                  <?php endif; ?>
                  <?php if ($qualifications): ?>
                    <span class='people-card__smallheader'>
                      <?php echo wp_kses_post($qualifications); ?>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>

        <h3>
          Guest Course Presenters
        </h3>
        <div class='guest-presenters'>
          <?php
          $presenters = new WP_Query([
            'post_type'      => 'plc_presenter',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
          ]);

          if ($presenters->have_posts()):
            while ($presenters->have_posts()): $presenters->the_post();

              // Core WP/Post fields
              $presenter_name = get_the_title();

              // ACF custom fields (adjust names to your field keys if different)
              $title  = get_field('title');        // Subheader
              $bio    = get_field('bio');          // Description paragraph
              $image  = get_field('portrait');     // Image field

              // Fallback image if portrait is missing
              $portrait_url = !empty($image['url'])
                ? esc_url($image['url'])
                : get_template_directory_uri() . '/assets/images/placeholders/headshot-placeholder.png';
          ?>
              <div class='guest-card'>
                <img class='guest-card__img' src='<?php echo $portrait_url; ?>' alt='Portrait' />
                <div class='guest-card__header'>
                  <h4 class='guest-card__heading'>
                    <?php echo esc_html($presenter_name); ?>
                  </h4>
                  <?php if ($title): ?>
                    <span class='guest-card__subheader'>
                      <?php echo esc_html($title); ?>
                    </span>
                  <?php endif; ?>
                </div>
                <?php if ($bio): ?>
                  <p><?php echo esc_html($bio); ?></p>
                <?php endif; ?>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
  <section class='section section--last'>
    <div class='container'>
      <div class='content content--center'>
        <div class='header__content header__content--center'>
          <h2>Client Testimonials</h2>
          <h1>Real Impact Across Victoria's Public Lands</h1>
        </div>
        <?php
        $quotes = get_field('quotes'); // The ACF repeater

        if ($quotes && is_array($quotes)):
          $count = count($quotes);
          $grid_class = 'grid-quotes' . ($count < 3 ? ' grid-quotes--flex' : '');
        ?>
          <div class="<?php echo $grid_class; ?>">
            <?php
            $should_offset = ($count === 3);
            foreach ($quotes as $i => $q):
              $offset = ($should_offset && ($i === 0 || $i === 2)) ? ' quote-card--offset' : '';
              $portrait = !empty($q['portrait']['url'])
                ? esc_url($q['portrait']['url'])
                : get_template_directory_uri() . '/assets/images/placeholders/headshot-placeholder.png';
            ?>
              <div class="quote-card<?php echo $offset ? ' ' . $offset : ''; ?>">
                <img class="quote-card__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/quotes--white.svg" alt="Quote" />
                <p><?php echo wp_kses_post($q['quote']); ?></p>
                <div class="quote-card__footer">
                  <img class="quote-card__portrait" src="<?php echo $portrait; ?>" alt="Portrait" />
                  <div class="quote-card__name">
                    <span class="quote-card__name__heading"><?php echo esc_html($q['name']); ?></span>
                    <span class="quote-card__name__subheading"><?php echo esc_html($q['title']); ?></span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>