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
});
