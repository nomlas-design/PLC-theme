<?php
/*
  Template Name: Licensed Surveyors Layout
  */
get_header();

?>

<main>
  <section class='section section--first section--last'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href='/certificates'>Professional Development</a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Courses for Licensed Surveyors</span>
      </div>
      <div class='grid grid--2-col grid--gap'>
        <div class='content'>
          <div class='header__content'>
            <h2>Professional Development</h2>
            <h1>Courses for Licensed Surveyors</h1>
            <p>
              The Public Land Consultancy is pleased to collaborate with the surveying profession to further enhance the knowledge base of Victoria's land surveyors. Our specialised courses are designed to address the unique challenges and requirements of the surveying discipline. </p>
            <p>
              <strong>FPET Accredited:</strong> Our Professional Development courses have been accredited by the Surveyors Registration Board and provide Further Professional Education or Training (FPET) points for Licensed Surveyors.
            </p>
            <p>
              All courses combine theoretical knowledge with practical, real-world applications, delivered by experts with extensive field experience.
            </p>
            <h3>
              Flexible Delivery Options
            </h3>
            <p>In addition to our scheduled presentations, all of our courses can be delivered in-house at your own offices, tailored to the specific needs of your team. Our courses are regularly presented in Melbourne, Geelong, and regional centers across Victoria.</p>
          </div>
          <div class='h-span'>
            <?php echo plc_2025_button([
              'text'    => 'Download Course Brochure',
              'url'     => '#form',
              'variant' => 'primary',
              'icon'    => 'download--white',
              'icon_position' => 'start',
              'size'    => 'large',
              'echo' => false,
            ]) ?>
          </div>
        </div>
        <div class='content content--end'>
          <img class='content__img content__img--large' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Courses for Licensed Surveyors' />
        </div>
      </div>
    </div>
</main>

<?php get_footer(); ?>