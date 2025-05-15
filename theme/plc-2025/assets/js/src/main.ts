import './accordion';

document.addEventListener('DOMContentLoaded', () => {
  // Constants
  const MOBILE_BREAKPOINT = 768;
  const SCROLL_THRESHOLD = 200;
  const menuToggle = document.querySelector('#menu-toggle');
  const navBar = document.querySelector('.header');

  menuToggle?.addEventListener('click', () => {
    navBar?.classList.toggle('header--open');
  });

  // Add a class to the body when the menu is open
  navBar?.addEventListener('transitionend', () => {
    if (navBar.classList.contains('header--open')) {
      document.body.classList.add('menu-open');
    } else {
      document.body.classList.remove('menu-open');
    }
  });

  // Close the menu when above the breakpoint
  let resizeTimer: NodeJS.Timeout;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if (
        window.innerWidth > MOBILE_BREAKPOINT &&
        navBar?.classList.contains('header--open')
      ) {
        navBar.classList.remove('header--open');
      }
    }, 250);
  });

  // Scroll handler for navbar
  let lastScrollTop = 0;
  let scrollTimer: NodeJS.Timeout;
  window.addEventListener('scroll', () => {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(() => {
      const currentScroll =
        window.scrollY || document.documentElement.scrollTop;

      if (currentScroll > SCROLL_THRESHOLD) {
        navBar?.classList.add('header--scrolled');
      } else {
        navBar?.classList.remove('header--scrolled');
      }

      if (currentScroll < lastScrollTop) {
        navBar?.classList.add('header--active');
      } else {
        navBar?.classList.remove('header--active');
      }

      lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
    }, 10);
  });

  const form = document.querySelector('.booking-form');
  const submitButton = document.querySelector('.booking-form__submit');
  const success = document.querySelector('.booking-form__success');

  submitButton?.addEventListener('click', (e) => {
    e.preventDefault();
    form?.classList.add('booking-form--hide');
    success?.classList.add('booking-form__success--show');
  });

  const sections = document.querySelectorAll('section');

  // Check if there are at least two sections
  if (sections.length >= 2) {
    // Get the second-to-last section
    const secondLastSection = sections[sections.length - 2];

    // Get the last section
    const lastSection = sections[sections.length - 1];

    // Check if the second-to-last section has the class 'section--bg'
    if (secondLastSection.classList.contains('section--bg')) {
      // Add the same class to the last section
      lastSection.classList.add('section--bg');
    }
  }
});
