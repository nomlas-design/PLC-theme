<?php
/*
  Template Name: Contact Layout
  */
get_header();

?>

<main>
  <section class='section section--first section--last'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Contact Us</span>
      </div>
      <div class='grid grid--2-col'>
        <div class='content content--start'>
          <div class='header__content'>
            <h2>Contact Us</h2>
            <h1>Get in Touch with the Public Land Consultancy</h1>
            <p>We are here to assist you with any inquiries or requests.</p>
          </div>
          <div class='contact-wrap'>
            <div class='contact-box'>
              <div class='contact-box__header'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/location.svg' alt='Email' />
                <h4>Office Address</h4>
              </div>
              <p>27/539 St Kilda Road</p>
              <p>Melbourne VIC 3004</p>
            </div>
            <div class='contact-box'>
              <div class='contact-box__header'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/mail.svg' alt='Email' />
                <h4>Mail To</h4>
              </div>
              <p>PO Box 2251</p>
              <p>St Kilda West VIC 3182</p>
            </div>
          </div>
          <div class='contact-box contact-box--single'>
            <span class='contact-box--single__text'>ABN:</span>
            <span>69 067 045 520</span>
          </div>
          <div class='contact-box__links'>
            <div class='contact-box contact-box--single'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--orange.svg' alt='Email' />
              <a href='mailto:dgj@publicland.com.au'>dgj@publicland.com.au</a>
            </div>
            <div class='contact-box contact-box--single'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--orange.svg' alt='Email' />
              <a href='mailto:dgj@publicland.com.au'>(03) 9534 5128</a>
            </div>
            <div class='contact-box contact-box--single'>
              <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/fax--orange.svg' alt='Email' />
              <a href='mailto:dgj@publicland.com.au'> (03) 9593 9085</a>
            </div>
          </div>
        </div>
        <div class='content content--end'>
          <div class='contact-form'>
            <form class="contact-form__form">
              <input type='text' name='firstName' placeholder='First Name *' required>
              <input type='text' name='lastName' placeholder='Last Name *' required>
              <input type='text' name='position' placeholder='Position *' required>
              <input type='text' name='organisation' placeholder='Organisation *' required>
              <input type='email' name='email' placeholder='Email *' required>
              <input type='tel' name='phone' placeholder='Phone'>

              <div class="checkbox-group">
                <label>
                  <input type="checkbox" name="subscribe" value="YES">
                  Subscribe me to Terra Publica
                </label>
              </div>

              <div class="checkbox-group">
                <label>
                  <input type="checkbox" name="engage" value="YES">
                  I would like to discuss engaging The Public Land Consultancy to provide professional advice
                </label>
              </div>

              <textarea name="comments" placeholder="Any further comments you want to send us at this stage" rows="4"></textarea>

              <?php echo plc_2025_button([
                'text'    => 'Send',
                'url'     => '#',
                'variant' => 'primary',
                'icon'    => 'arrow-right',
                'size'    => 'large',
                'echo' => false,
              ]) ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>