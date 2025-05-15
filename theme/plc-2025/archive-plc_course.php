<?php
/*
Template Name: Courses Layout
*/
get_header();
?>

<main>
  <section class='section section--first  section--bg'>
    <div class='container'>
      <div class='breadcrumbs'>
        <img class='breadcrumbs__icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/home.svg' alt='Home' />
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />
        <a class='breadcrumbs__prev' href='/courses'>Professional Development</a>
        <img class='breadcrumbs__right' src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/chevron-right.svg' alt='Arrow' />

        <span class='breadcrumbs__active'>Courses and Events</span>
      </div>
      <div class='grid grid--2-col'>
        <div class='content'>
          <div class='header__content'>
            <h2>Our free monthly event</h2>
            <h1>Lunchtime Conversations</h1>
            <p class='text-lg'>
              Join us on-line on the second Tuesday of every month from 12 noon to 12.45pm for a lively, interactive, casual chat all about different topics relating to Public Land. 
            </p>
          </div>

        </div>
        <div class='content'>
          <div data-type='free' data-open='open' data-alpha='lunchtime-conversations' data-data='11-03-2025' class='courses-child'>
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
      </div>
    </div>
  </section>
  <section class='section section--courses section--last'>
    <div class='container container--courses'>
      <div class='content content--courses'>
        <div class='header__content'>
          <h2>Training and Events</h2>
          <h1>Find All Our Courses and Events Here</h1>
          <p>
            This page brings together all our learning opportunities in one location. Our courses and events are soundly based in law and policy, providing a practical understanding of complex technical issues and de-mystifying the bureaucratic and legal jargon which so often obscures them.
          </p>
          <p>
            We offer a variety of formats to meet different learning needs:
          </p>
          <ul>
            <li><strong>Online Courses:</strong> Typically three sessions of 2 hours each, spread over separate days from 10:00 am to 12:00 noon via Zoom</li>
            <li><strong>In-Person Seminars:</strong> Full-day presentations, usually from 9:00 am until 4:30 pm</li>
            <li><strong>Free Events:</strong> Monthly discussions on current public land topics</li>
          </ul>
          <p>
            Our online platform allows presenters and participants to see each other, maintaining the valuable round-the-table peer-group dialogue, questions, answers, and comments that enhance the learning experience. No special software installation is required to participate.
          </p>
        </div>
      </div>
      <div class='courses-controls'>
        <div class='courses-controls__group'>
          <div class='courses-controls__label'>Course Format</div>
          <div class='courses-controls__select'>
            <select id='format-filter' class='courses-controls__dropdown'>
              <option value='all'>All Formats</option>
              <option value='online'>Online Course</option>
              <option value='seminar'>In-Person Seminars</option>
              <option value='free'>Free Events</option>
            </select>
          </div>
        </div>

        <div class='courses-controls__group'>
          <div class='courses-controls__label'>Availability</div>
          <div class='courses-controls__select'>
            <select id='availability-filter' class='courses-controls__dropdown'>
              <option value='all'>All Courses</option>
              <option value='open'>Enrolling Now</option>
              <option value='upcoming'>Upcoming</option>
            </select>
          </div>
        </div>

        <div class='courses-controls__group'>
          <div class='courses-controls__label'>Sort By</div>
          <div class='courses-controls__select'>
            <select id='sort-by' class='courses-controls__dropdown'>
              <option value='date'>Starting Soon</option>
              <option value='alpha'>Alphabetical</option>
            </select>
          </div>
        </div>
      </div>
      <div class='courses-grid courses-grid--courses'>
        <div data-type='free' data-open='open' data-alpha='lunchtime-conversations' data-data='11-03-2025' class='courses-child'>
          <div class='courses-child__img'>
            <div class='courses-child__badges'>
              <div class='courses-child__badge courses-child__badge--category'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/tag--white.svg' alt='Calendar' />
                <span>Free Monthly Event</span>
              </div>
              <div class='courses-child__badge courses-child__badge--availability'>
                <span>Enrolling Now</span>
              </div>
            </div>
            <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/conversations.png' alt='Placeholder' />
          </div>
          <div class='courses-child__content'>
            <div class='courses-child__text'>
              <h3 class='courses-child__title'>Lunchtime Conversations about Public Land</h3>
              <p class='courses-child__description'>
                A free monthly event where we discuss different topics relating to Public Land.
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
              'text'    => 'View Details',
              'url'     => '/',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>

          </div>
        </div>
        <div data-type='online' data-open='open' class='courses-child' data-alpha='restrictions-on-title' data-date='19-03-2025'>
          <div class='courses-child__img'>
            <div class='courses-child__badges'>
              <div class='courses-child__badge courses-child__badge--category'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/tag--white.svg' alt='Calendar' />
                <span>Online Course</span>
              </div>
              <div class='courses-child__badge courses-child__badge--availability'>
                <span>Enrolling Now</span>
              </div>
            </div>
            <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/restrictions.jpg' alt='Placeholder' />
          </div>
          <div class='courses-child__content'>
            <div class='courses-child__text'>
              <h3 class='courses-child__title'>Restrictions on Title</h3>
              <p class='courses-child__description'>
                A two-session online course teaching government staff how public interests can coexist with private property rights through various legal mechanisms.</p>
            </div>
            <div class='courses-child__presenter'>
              <img class='courses-child__presenter__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/headshot.jpg' alt='Presenter' />
              <span>Presented by: <strong>Nick Sissons</strong></span>
            </div>
            <div class='courses-child__schedule'>
              <div class='courses-child__schedule__header'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Calendar' />
                <span>Schedule</span>
              </div>
              <div class='courses-child__schedule__list'>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Wed, 19 March
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>10:00 AM - 1:00 PM</span>
                  </div>
                </div>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Thu, 20 March
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>10:00 AM - 1:00 PM</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='courses-child__cta'>
            <?php echo plc_2025_button([
              'text'    => 'View Details',
              'url'     => '/event-single',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>

          </div>
        </div>
        <div data-type='online' data-open='open' class='courses-child' data-alpha='crown-land-governance' data-date='01-04-2025'>
          <div class='courses-child__img'>
            <div class='courses-child__badges'>
              <div class='courses-child__badge courses-child__badge--category'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/tag--white.svg' alt='Calendar' />
                <span>Online Course</span>
              </div>
              <div class='courses-child__badge courses-child__badge--availability'>
                <span>Enrolling Now</span>
              </div>
            </div>
            <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/crown.jpg' alt='Placeholder' />
          </div>
          <div class='courses-child__content'>
            <div class='courses-child__text'>
              <h3 class='courses-child__title'>Crown Land Governance</h3>
              <p class='courses-child__description'>
                This 3-session online course is essential learning for any professional officer dealing with land in Victoria.
              </p>
            </div>
            <div class='courses-child__presenter'>
              <img class='courses-child__presenter__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/headshot-placeholder.png' alt='Presenter' />
              <span>Presented by: <strong>David Gabriel-Jones</strong></span>
            </div>
            <div class='courses-child__schedule'>
              <div class='courses-child__schedule__header'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Calendar' />
                <span>Schedule</span>
              </div>
              <div class='courses-child__schedule__list'>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Tue, 1 April
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>10:00 AM - 12:00 PM</span>
                  </div>
                </div>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Wed, 2 April
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>10:00 AM - 12:00 PM</span>
                  </div>
                </div>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Thu, 2 April
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>10:00 AM - 12:00 PM</span>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class='courses-child__cta'>
            <?php echo plc_2025_button([
              'text'    => 'View Details',
              'url'     => '/',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>

          </div>
        </div>
        <div data-type='seminar' data-open='open' class='courses-child' data-alpha='example-seminar' data-date='15-06-2025'>
          <div class='courses-child__img'>
            <div class='courses-child__badges'>
              <div class='courses-child__badge courses-child__badge--category'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/tag--white.svg' alt='Calendar' />
                <span>Seminar</span>
              </div>
              <div class='courses-child__badge courses-child__badge--availability'>
                <span>Enrolling Now</span>
              </div>
            </div>
            <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/seminar.png' alt='Placeholder' />
          </div>
          <div class='courses-child__content'>
            <div class='courses-child__text'>
              <h3 class='courses-child__title'>Example Seminar</h3>
              <p class='courses-child__description'>
                This one day seminar covers something amazing.
            </div>
            <div class='courses-child__presenterwrap'>
              <div class='courses-child__presenter'>
                <img class='courses-child__presenter__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/headshot-placeholder.png' alt='Presenter' />
                <span>Presented by: <strong>David Gabriel-Jones</strong></span>
              </div>
              <div class='courses-child__presenter'>
                <img class='courses-child__presenter__img' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/headshot.jpg' alt='Presenter' />
                <span>Presented by: <strong>Nick Sissons</strong></span>
              </div>
            </div>
            <div class='courses-child__schedule'>
              <div class='courses-child__schedule__header'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Calendar' />
                <span>Schedule</span>
              </div>
              <div class='courses-child__schedule__list'>
                <div class='courses-child__schedule__item'>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/calendar.svg' alt='Date' />
                    <span> Wed, 15 Jun
                    </span>
                  </div>
                  <div class='courses-child__schedule__item__span'>
                    <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/clock.svg' alt='Time' />
                    <span>9:00 AM - 4:00 PM</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class='courses-child__cta'>
            <?php echo plc_2025_button([
              'text'    => 'View Details',
              'url'     => '/',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>

          </div>
        </div>
        <div data-type='online' data-open='closed' class='courses-child' data-alpha='risk-management' data-date=''>
          <div class='courses-child__img'>
            <div class='courses-child__badges'>
              <div class='courses-child__badge courses-child__badge--category'>
                <img src='<?php echo get_template_directory_uri(); ?>/assets/images/icons/tag--white.svg' alt='Calendar' />
                <span>Online Course</span>
              </div>
              <div class='courses-child__badge courses-child__badge--availability courses-child__badge--availability--waitlist'>
                <span>Join the Waitlist</span>
              </div>
            </div>
            <img class='courses-child__thumb' src='<?php echo get_template_directory_uri(); ?>/assets/images/placeholders/risk-management.jpg' alt='Placeholder' />
          </div>
          <div class='courses-child__content'>
            <div class='courses-child__text'>
              <h3 class='courses-child__title'>Risk Management and the Law</h3>
              <p class='courses-child__description'>
                A three-session online course essential for public land and road managers covering legal liabilities, ANZ risk management standards, and expert insurance guidance.
            </div>
            <div class='courses-child__schedule'>
              <span class='courses-child__schedule__italic'>No scheduled sessions available</span>
            </div>
          </div>
          <div class='courses-child__cta'>
            <?php echo plc_2025_button([
              'text'    => 'View Details',
              'url'     => '/',
              'variant' => 'secondary',
              'icon'    => 'arrow-right--orange',
              'hover_icon' => 'arrow-right',
              'size'    => 'small',
              'echo' => false,
            ]) ?>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>