/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/*!**********************************!*\
  !*** ./assets/js/src/booking.ts ***!
  \**********************************/

document.addEventListener('DOMContentLoaded', () => {
    var _a, _b;
    const courseTitle = (_a = document.querySelector('.booking-form__schedule__header')) === null || _a === void 0 ? void 0 : _a.textContent;
    const courseInput = document.querySelector('input[name="course"]');
    const scheduleTitle = (_b = document.querySelector('.schedule__header__hidden')) === null || _b === void 0 ? void 0 : _b.textContent;
    const scheduleInput = document.querySelector('input[name="session"]');
    if (courseInput && courseTitle) {
        courseInput.value = courseTitle.trim();
    }
    if (scheduleInput && scheduleTitle) {
        scheduleInput.value = scheduleTitle.trim();
    }
});

/******/ })()
;
//# sourceMappingURL=booking.js.map