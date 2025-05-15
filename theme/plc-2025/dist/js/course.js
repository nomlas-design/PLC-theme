/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/*!*********************************!*\
  !*** ./assets/js/src/course.ts ***!
  \*********************************/

document.addEventListener('DOMContentLoaded', function () {
    function showCopiedPopup(message) {
        // Create and configure the popup div
        const popup = document.querySelector('.share-popup') || document.createElement('div');
        popup.textContent = message;
    }
    const shareBtn = document.querySelector('.share-btn');
    const sharePopup = document.querySelector('.share-popup');
    shareBtn === null || shareBtn === void 0 ? void 0 : shareBtn.addEventListener('click', () => {
        sharePopup === null || sharePopup === void 0 ? void 0 : sharePopup.classList.add('share-popup--animate');
        const text = `${document.title}\n${window.location.href}`;
        navigator.clipboard.writeText(text).then(() => {
            showCopiedPopup('Link copied!');
        });
        setTimeout(() => {
            sharePopup === null || sharePopup === void 0 ? void 0 : sharePopup.classList.remove('share-popup--animate');
        }, 1500);
    });
});

/******/ })()
;
//# sourceMappingURL=course.js.map