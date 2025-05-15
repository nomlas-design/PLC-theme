import Splide from '@splidejs/splide';

document.addEventListener('DOMContentLoaded', () => {
  // Initialize Splide
  const splide = new Splide('#hero-slider', {
    rewind: true,
    type: 'loop',
    speed: 1000,
    autoplay: true,
    interval: 5000,
    pauseOnHover: true,
    arrows: false,
    pagination: true,
    focus: 0,
    perPage: 2,
    height: '400px',
    gap: '2rem',
    lazyLoad: 'nearby', // Enable lazy loading
    preloadPages: 1, // Preload one page
  });

  // Mount the slider
  splide.mount();
});
