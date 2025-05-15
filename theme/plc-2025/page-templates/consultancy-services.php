<?php
/*
  Template Name: Consultancy Services Layout
  */
get_header();

?>

<main>
  <section class='section section--first'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Consultancy Services</span>
      </div>
      <div class='grid grid--2-col grid--gap'>
        <div class='content'>
          <div class='header__content'>
            <h2>Consultancy Services</h2>
            <h1>Expert Solutions for Public Land Governance</h1>
            <p>The Public Land Consultancy provides expert guidance on the management, governance, and strategic development of public land resources. Our extensive experience with government departments, local councils, and private organisations positions us as leaders in navigating the complex landscape of public land administration.</p>
            <?php echo plc_2025_button([
              'text'    => 'Request a Consultation',
              'url'     => '#form',
              'variant' => 'primary',
              'icon'    => 'arrow-right',
              'size'    => 'large',
              'echo' => false,
            ]) ?>
          </div>
        </div>
        <div class='content'>
          <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Consultancy Services' />
        </div>
      </div>
    </div>
  </section>
  <section class='section section--logos'>
    <div class='container container--logos'>
      <h2>Trusted by Public Land Stakeholders</h2>
      <div class='logos-wrap'>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>
        <div class='logos-wrap__logo'>
          <img src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/pacifc-hydro_logo.png' alt='Department of Environment' />
        </div>

      </div>
  </section>
  <section class='section section--img section--img--5'>
    <div class='container'>
      <div class='content content--section'>
        <div class='grid grid--2-col grid--gap'>
          <div class='content'>
            <div class='content__imgwrap'>
              <div class='content__imgtag'>
                If we need to an image description
              </div>
              <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Consultancy Services' />
            </div>
          </div>
          <div class='consultant-card'>
            <h3>Our Consultancy Services</h3>
            <ul>
              <li>Resolution of public land governance issues</li>
              <li>Risk analyses and risk minimisation strategies for public land managers</li>
              <li>Analysis and interpretation of land status information</li>
              <li>Development of policy and strategy regarding Public Land</li>
              <li>Relationships management on Public Land</li>
              <li>Design and management of change processes for Public Land</li>
              <li>Professional development and staff training relating to Public Land</li>
            </ul>
          </div>
        </div>
        <div class='grid grid--2-col'>

          <div class='consultant-card'>
            <h3>Retainer-based Advice</h3>
            <p><em>Through our Retainer-based Consultancy Service we can assist you with…</em></p>
            <ul>
              <li>A ten minute phone discussion</li>
              <li>A brief exchange of emails</li>
              <li>More formal written opinion</li>
              <li>On-going mentoring and coaching</li>
              <li>Our 'Q&A' article in Terra Publica</li>
            </ul>
          </div>
          <div class='content'>
            <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Consultancy Services' />
          </div>
        </div>
        <div class='grid grid--2-col'>
          <div class='content'>
            <img class='content__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/river.png' alt='Consultancy Services' />
          </div>
          <div class='consultant-card'>
            <h3>Risk Management</h3>
            <ul>
              <li>Expert evidence in accordance with Supreme Court Rules</li>
              <li>Risk Assessments and Evaluations</li>
              <li>Risk Alleviation Strategies in accordance with ISO 31000:2009</li>
              <li>Insurance Cover Reviews</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id='form' class='section section--bg section--last'>
    <div class='container'>
      <div class='grid grid--2-col'>
        <div class='content'>
          <div class='header__content'>
            <h2>Get Expert Advice</h2>
            <h1>Request a Consultation</h1>
            <p>Our team is ready to provide advice and services for your specific needs.</p>
          </div>
          <div class='contact-info'>
            <div class='contact-info__item'>
              <img class='contact-info__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--orange.svg' alt='Phone' />
              <a href=''> (03) 9534 5128</a>
            </div>
            <div class='contact-info__item'>
              <img class='contact-info__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--orange.svg' alt='Phone' />
              <a href=''>
                dgj@publicland.com.au
              </a>
            </div>
          </div>
        </div>
        <div class='content'>
          <div id="form" class='consultancy-form'>
            <?php echo do_shortcode('[contact-form-7 id="db532fb" title="Consultancy Form"]') ?>
          </div>
        </div>
      </div>

  </section>
</main>

<?php get_footer(); ?>