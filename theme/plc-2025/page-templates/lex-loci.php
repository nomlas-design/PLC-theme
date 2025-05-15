<?php
/*
  Template Name: Lex Loci Layout
  */
get_header();

?>

<main>
  <section class='section section--first'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href='/publications'>Publications</a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Lex Loci</span>
      </div>

      <div class='content'>
        <div class='header__content'>
          <h2>Publications</h2>
          <h1>Lex Loci's Travels</h1>
          <p>
            Lex Loci's Travels is an ad hoc one-pager from The Public Land Consultancy. Read about his past explorations here...
          </p>
        </div>
        <div class='lex-loci'>
          <div class='lex-loci__year'>
            <h3>2022</h3>
            <div class='lex-loci__item'>
              <div class='lex-loci__item__title'>
                Lex in Soho (Geelong)
              </div>
              <div class='lex-loci__item__date'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                <span> 17 Nov 2022</span>
              </div>
            </div>
            <div class='lex-loci__item'>
              <div class='lex-loci__item__title'>
                Lex in Soho (Geelong)
              </div>
              <div class='lex-loci__item__date'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                <span> 17 Nov 2022</span>
              </div>
            </div>
            <div class='lex-loci__item'>
              <div class='lex-loci__item__title'>
                Lex in Soho (Geelong)
              </div>
              <div class='lex-loci__item__date'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                <span> 17 Nov 2022</span>
              </div>
            </div>
          </div>
        </div>
        <div class='lex-loci__year'>
          <h3>2021</h3>
          <div class='lex-loci__item'>
            <div class='lex-loci__item__title'>
              Lex in Soho (Geelong)
            </div>
            <div class='lex-loci__item__date'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
              <span> 17 Nov 2022</span>
            </div>
          </div>
          <div class='lex-loci__item'>
            <div class='lex-loci__item__title'>
              Lex in Soho (Geelong)
            </div>
            <div class='lex-loci__item__date'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
              <span> 17 Nov 2022</span>
            </div>
          </div>
          <div class='lex-loci__item'>
            <div class='lex-loci__item__title'>
              Lex in Soho (Geelong)
            </div>
            <div class='lex-loci__item__date'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
              <span> 17 Nov 2022</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php get_footer(); ?>