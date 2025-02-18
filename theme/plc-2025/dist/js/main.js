/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./assets/js/src/main.ts ***!
  \*******************************/

document.addEventListener('DOMContentLoaded', () => {
    // Constants
    const MOBILE_BREAKPOINT = 768;
    const SCROLL_THRESHOLD = 200;
    const menuToggle = document.querySelector('#menu-toggle');
    const navBar = document.querySelector('.header');
    menuToggle === null || menuToggle === void 0 ? void 0 : menuToggle.addEventListener('click', () => {
        navBar === null || navBar === void 0 ? void 0 : navBar.classList.toggle('header--open');
    });
    // fake a click on menu for debug
    // setTimeout(() => {
    //   menuToggle?.dispatchEvent(new Event('click'));
    // }, 1000);
    // Add a class to the body when the menu is open
    navBar === null || navBar === void 0 ? void 0 : navBar.addEventListener('transitionend', () => {
        if (navBar.classList.contains('header--open')) {
            document.body.classList.add('menu-open');
        }
        else {
            document.body.classList.remove('menu-open');
        }
    });
    // Close the menu when above the breakpoint
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > MOBILE_BREAKPOINT &&
                (navBar === null || navBar === void 0 ? void 0 : navBar.classList.contains('header--open'))) {
                navBar.classList.remove('header--open');
            }
        }, 250);
    });
    // Scroll handler for navbar
    let lastScrollTop = 0;
    let scrollTimer;
    window.addEventListener('scroll', () => {
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(() => {
            const currentScroll = window.scrollY || document.documentElement.scrollTop;
            if (currentScroll > SCROLL_THRESHOLD) {
                navBar === null || navBar === void 0 ? void 0 : navBar.classList.add('header--scrolled');
            }
            else {
                navBar === null || navBar === void 0 ? void 0 : navBar.classList.remove('header--scrolled');
            }
            if (currentScroll < lastScrollTop) {
                navBar === null || navBar === void 0 ? void 0 : navBar.classList.add('header--active');
            }
            else {
                navBar === null || navBar === void 0 ? void 0 : navBar.classList.remove('header--active');
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        }, 10);
    });
});

})();

// This entry needs to be wrapped in an IIFE because it needs to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./assets/scss/main.scss ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin

})();

/******/ })()
;
//# sourceMappingURL=main.js.map