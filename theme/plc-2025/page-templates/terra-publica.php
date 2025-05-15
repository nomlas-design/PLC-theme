<?php
/*
  Template Name: Terra Publica Layout
  */
get_header();

$terra_query = new WP_Query([
  'post_type'      => 'plc_terra',
  'posts_per_page' => -1,
  'meta_key'       => 'date',          // ACF date field
  'orderby'        => 'meta_value_num', // Use meta_value_num for Ymd format
  'order'          => 'DESC',
]);
?>


<main>
  <section class='section section--first section--img section--img--4'>
    <div class='container'>
      <div class='grid grid--2-col'>
        <div class='content'>
          <div class='header__content'>
            <h2>Our free monthly bulletin</h2>
            <h1>Terra Publica</h1>
            <p>
              Our free monthly Email Bulletin of information, commentary and analysis of public land issues in Victoria.
            </p>
            <p>
              Subscribe below to receive the latest edition of Terra Publica each month straight to your inbox.
            </p>
          </div>
          <form id="terra-signup" method="post" action="#">
            <input type="text" id="name" name="name" placeholder="Your name" required>
            <input type="email" id="email" name="email" placeholder="Your email address" required>
            <button type="submit" class="btn btn--primary">Subscribe</button>
          </form>
        </div>
        <?php
        if ($terra_query->have_posts()) :
          $terra_query->the_post();

          // Gather ACF and core fields
          $title     = get_the_title();
          $date      = get_field('date'); // E.g., 20250201
          $date_obj  = $date ? DateTime::createFromFormat('Ymd', $date) : false;
          $date_str  = $date_obj ? $date_obj->format('F Y') : '';
          $intro     = get_field('intro');
          $image     = get_field('image');
          $image_url = !empty($image['url']) ? esc_url($image['url']) : get_template_directory_uri() . '/assets/images/placeholders/terra-placeholder.png';
          $upload    = get_field('upload');
          $download_url = !empty($upload['url']) ? esc_url($upload['url']) : '#';
          $download_details = '';
          if (!empty($upload['filesize'])) {
            $kb = round($upload['filesize'] / 1024);
            $download_details = 'PDF, ' . $kb . 'KB';
          }
        ?>
          <div class='terra-card terra-card--featured'>
            <a href="<?php echo $download_url ?>" class='terra-card__img'>
              <img src='<?php echo $image_url; ?>' alt='<?php echo esc_attr($title); ?>' />
            </a>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'><?php echo esc_html($title); ?></span>
              <?php echo the_field('intro'); ?>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'         => 'Download',
                  'url'          => $download_url,
                  'variant'      => 'secondary',
                  'icon'         => 'download--orange',
                  'hover_icon'   => 'download--white',
                  'icon_position' => 'start',
                  'size'         => 'small',
                  'echo'         => false,
                  'attributes' => [
                    'target' => '_blank',
                    'rel' => 'noopener noreferrer' // Security best practice when using target="_blank"
                  ],
                ]); ?>
                <span class='terra-card__details'>
                  <?php echo esc_html($download_details); ?>
                </span>
              </div>
            </div>
          </div>
        <?php
        endif;
        ?>

  </section>

  <section class='section section--bg'>
    <div class='container'>
      <div class='content'>
        <div class='grid grid--3-col'>
          <div class='header__content span-2'>
            <h2>Download all previous editions</h2>
            <h1>Terra Public Archive</h1>
            <p>Explore our complete collection of Terra Publica newsletters - featuring case studies, legal updates, and expert analysis on public land governance.</p>
          </div>
          <div class='terra-controls'>
            <div class='terra-controls__group'>
              <div class='terra-controls__label'>Sort By</div>
              <div class='terra-controls__select'>
                <select id='availability-filter' class='terra-controls__dropdown'>
                  <option value='all'>Date Ascending</option>
                  <option value='open'>Date Descending</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class='grid grid--4-col'>
          <?php
          if ($terra_query->have_posts()) :
            $i = 0;
            while ($terra_query->have_posts()) : $terra_query->the_post();
              // Skip the first post (already rendered as featured)

              $title     = get_the_title();
              $date      = get_field('date');
              $date_obj  = $date ? DateTime::createFromFormat('Ymd', $date) : false;
              $date_str  = $date_obj ? $date_obj->format('F Y') : '';
              $intro     = get_field('intro');
              $image     = get_field('image');
              $image_url = !empty($image['url']) ? esc_url($image['url']) : get_template_directory_uri() . '/assets/images/placeholders/conflicts_coastal.png';
              $upload    = get_field('upload');
              $download_url = !empty($upload['url']) ? esc_url($upload['url']) : '#';
              $download_details = '';
              if (!empty($upload['filesize'])) {
                $kb = round($upload['filesize'] / 1024);
                $download_details = 'PDF, ' . $kb . 'KB';
              }
          ?>
              <div class='terra-card'>
                <a href="<?php echo $download_url ?>" target='_blank' class='terra-card__img'>
                  <img src='<?php echo $image_url; ?>' alt='<?php echo esc_attr($title); ?>' />
                </a>
                <div class='terra-card__content'>
                  <div class='terra-card__innercontent'>
                    <span class='terra-card__content__title'><?php echo esc_html($title); ?></span>
                    <?php echo the_field('intro'); ?>
                  </div>
                  <div class='terra-card__footer'>
                    <?php echo plc_2025_button([
                      'text'         => 'Download',
                      'url'          => $download_url,
                      'variant'      => 'transparent',
                      'icon'         => 'download',
                      'size'         => 'small',
                      'icon_position' => 'start',
                      'attributes' => [
                        'target' => '_blank',
                        'rel' => 'noopener noreferrer' // Security best practice when using target="_blank"
                      ],
                      'echo'         => false,
                    ]); ?>
                    <span class='terra-card__details'>
                      <?php echo esc_html($download_details); ?>
                    </span>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>

          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
          <div class='terra-card'>
            <div class='terra-card__img'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Terra Publica' />
            </div>
            <div class='terra-card__content'>
              <span class='terra-card__content__title'>January 2025</span>
              <p>The Victorian coastline is disputed territory. Here we find many contests between private self-interest and the public good. In this edition we look at a series of foreshore battlegrounds, where we find ourselves decidely on the side of the public.</p>
              <div class='terra-card__footer'>
                <?php echo plc_2025_button([
                  'text'    => 'Download',
                  'url'     => '/',
                  'variant' => 'transparent',
                  'icon'    => 'download',
                  'size'    => 'small',
                  'icon_position' => 'start',
                  'echo' => false,
                ]) ?>
                <span class='terra-card__details'>
                  PDF, 574KB
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>