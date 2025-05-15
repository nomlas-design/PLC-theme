/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/js/src/accordion.ts":
/*!************************************!*\
  !*** ./assets/js/src/accordion.ts ***!
  \************************************/
/***/ (() => {


/**
 * Accordion component functionality
 * Handles accordion open/close behavior and accessibility
 */
document.addEventListener('DOMContentLoaded', () => {
    // Find all accordion groups on the page
    const accordionGroups = document.querySelectorAll('.accordion-group');
    accordionGroups.forEach((group) => {
        const isSingleOpen = group.dataset.accordionSingleOpen === 'true';
        const accordions = group.querySelectorAll('.accordion');
        // Set up click handlers for each accordion in this group
        accordions.forEach((accordion) => {
            const toggleButton = accordion.querySelector('.accordion__toggle');
            const contentPanel = accordion.querySelector('.accordion__body');
            if (!toggleButton || !contentPanel)
                return;
            toggleButton.addEventListener('click', () => {
                const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
                // If this is a single-open group, close all other accordions first
                if (isSingleOpen && !isExpanded) {
                    accordions.forEach((otherAccordion) => {
                        if (otherAccordion !== accordion) {
                            const otherButton = otherAccordion.querySelector('.accordion__toggle');
                            const otherPanel = otherAccordion.querySelector('.accordion__body');
                            const otherChevron = otherAccordion.querySelector('.accordion__chevron');
                            if (otherButton && otherPanel) {
                                otherButton.setAttribute('aria-expanded', 'false');
                                otherPanel.setAttribute('hidden', '');
                                otherAccordion.classList.remove('accordion--open');
                                // Remove rotation from other chevrons
                                if (otherChevron) {
                                    otherChevron.classList.remove('accordion__chevron--rotated');
                                }
                            }
                        }
                    });
                }
                // Toggle current accordion
                toggleButton.setAttribute('aria-expanded', (!isExpanded).toString());
                if (isExpanded) {
                    contentPanel.setAttribute('hidden', '');
                    accordion.classList.remove('accordion--open');
                }
                else {
                    contentPanel.removeAttribute('hidden');
                    accordion.classList.add('accordion--open');
                }
                // Rotate chevron (not the title icon)
                const chevron = toggleButton.querySelector('.accordion__chevron');
                if (chevron) {
                    chevron.classList.toggle('accordion__chevron--rotated');
                }
            });
        });
    });
});


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./assets/js/src/main.ts ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _accordion__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./accordion */ "./assets/js/src/accordion.ts");
/* harmony import */ var _accordion__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_accordion__WEBPACK_IMPORTED_MODULE_0__);

document.addEventListener('DOMContentLoaded', () => {
    // Constants
    const MOBILE_BREAKPOINT = 768;
    const SCROLL_THRESHOLD = 200;
    const menuToggle = document.querySelector('#menu-toggle');
    const navBar = document.querySelector('.header');
    menuToggle === null || menuToggle === void 0 ? void 0 : menuToggle.addEventListener('click', () => {
        navBar === null || navBar === void 0 ? void 0 : navBar.classList.toggle('header--open');
    });
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
    const form = document.querySelector('.booking-form');
    const submitButton = document.querySelector('.booking-form__submit');
    const success = document.querySelector('.booking-form__success');
    submitButton === null || submitButton === void 0 ? void 0 : submitButton.addEventListener('click', (e) => {
        e.preventDefault();
        form === null || form === void 0 ? void 0 : form.classList.add('booking-form--hide');
        success === null || success === void 0 ? void 0 : success.classList.add('booking-form__success--show');
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