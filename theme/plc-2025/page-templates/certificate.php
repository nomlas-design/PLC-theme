<?php
/*
  Template Name: Professional Certficates Layout
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

        <span class='breadcrumbs__active'>Professional Certifcates</span>
      </div>
      <div class='grid grid--2-col'>
        <div class='content content--start'>
          <div class='header__content'>
            <h2>Professional Development</h2>
            <h1>Professional Certificates in Public Land Governance</h1>
            <p>
              The Public Land Consultancy is proud to offer our comprehensive certification program designed for professionals working with public land administration and management across Victoria.
            </p>
            <p>
              The <strong>Professional Certificate in Public Land Governance</strong> emphasises the acquisition of practical cross-disciplinary understanding of land law, directly relevant to real-world situations encountered by Victorian municipalities and statutory authorities.
            </p>
          </div>
          <?php echo plc_2025_button([
            'text'    => 'WHO TO CONTACT?',
            'url'     => '#form',
            'variant' => 'secondary',
            'icon'    => 'arrow-right--orange',
            'hover_icon' => 'arrow-right',
            'size'    => 'small',
            'echo' => false,
          ]) ?>
        </div>
        <div class='content content--end content--titleoffset'>
          <div class='certificate-card'>
            <h3>Program Structure</h3>
            <ul>
              <li><strong>Course Attendance:</strong> Participate in three one-day training courses from our <a href='#'>suite of offerings</a></li>
              <li><strong>Written Component:</strong> Submit a 3,000-word research/discussion paper</li>
              <li><strong>Time Frame:</strong> Complete all requirements within a 2-year period</li>
              <li><strong>Flexibility:</strong> Start at any time throughout the year</li>
              <li><strong>Cost:</strong> $2,000 plus GST (includes three course fees and guidance for written report)</li>
            </ul>
          </div>
          <div class='content'>
            <h3>Course Locations</h3>
            <p>The certificate components are offered at the Law Institute of Victoria in Melbourne, and depending on demand, in regional centers including Geelong, Horsham, Bendigo, Wangaratta, Benalla, and Warragul.</p>
          </div>
        </div>
      </div>
    </div>
</main>

<?php get_footer(); ?>