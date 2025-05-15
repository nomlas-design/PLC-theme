<section class='section section--reduced section--footercta'>
  <div class='container'>
    <div class='grid-footercta'>
      <div class='grid-footercta__imgwrap'>
        <a href='#' class='grid-footercta__img'>
          <img class='thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/conflicts_coastal.png' alt='Book' />
          <div class='h-span'>
            <img class='grid-footercta__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/download--white.svg' alt='PDF' />
            <div class='v-span'>
              <span class='subhead'>Donwload Latest:</span>
              <span class='subhead'>VOL 25 NO 2: FEBRUARY 2025</span>
            </div>
          </div>
        </a>
      </div>
      <div class='content'>
        <div class='header__content'>
          <h2>Our free monthly bulletin</h2>
          <h1>Terra Publica</h1>
          <p>
            Our free monthly Email Bulletin of information, commentary and analysis of public land issues in Victoria.
          </p>
        </div>
        <form id="terra-signup" method="post" action="#">
          <input type="text" id="name" name="name" placeholder="Your name" required>
          <input type="email" id="email" name="email" placeholder="Your email address" required>
          <button type="submit" class="btn btn--primary">Subscribe</button>
        </form>
      </div>
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class='grid-footer'>
      <img class='grid-footer__logo' src='<?php echo get_template_directory_uri(); ?>/assets/images/logo--white.png' alt='Public Land Consultancy' />

      <div class='grid-footer__column'>
        <div class='h-span'>
          <img class='grid-footer__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/location--white.svg' alt='Email' />
          <span>27/539 St Kilda Road, Melbourne VIC 3004</span>
        </div>

        <div class='h-span'>
          <img class='grid-footer__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/email--white.svg' alt='Email' />
          <a href='tel:0395345128'>dgj@publicland.com.au</a>
        </div>
        <div class='h-span'>
          <img class='grid-footer__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/phone--white.svg' alt='Phone' />
          <a href='tel:0395345128'>(03) 9534 5128</a>
        </div>
        <div class='h-span'>
          <img class='grid-footer__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/fax--white.svg' alt='Phone' />
          <a href='tel:0395345128'>(03) 9593 9085</a>
        </div>
      </div>
      <div class='grid-footer__column'>
        <span class='grid-footer__heading'>About</span>
        <a href='/about' class='grid-footer__link'>About Us</a>
        <a href='/contact-us' class='grid-footer__link'>Contact Us</a>

      </div>
      <div class='grid-footer__column'>
        <span class='grid-footer__heading'>Services</span>
        <a href='/courses' class='grid-footer__link'>Courses</a>
        <a href='/consultancy-services' class='grid-footer__link'>Consultancy Services</a>
        <a href='/professional-certificates' class='grid-footer__link'>Professional Certificates</a>
        <a href='/courses-for-licensed-surveyors' class='grid-footer__link'>Courses for Licensed Surveyors</a>
      </div>
      <div class='grid-footer__column'>
        <span class='grid-footer__heading'>Publications</span>
        <a href='/terra-publica' class='grid-footer__link'>Terra Publica</a>

      </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>