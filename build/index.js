/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/sass/main.scss":
/*!*******************************!*\
  !*** ./assets/sass/main.scss ***!
  \*******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


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
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _assets_sass_main_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../assets/sass/main.scss */ "./assets/sass/main.scss");

// import "../assets/css/style.css";

(function () {
  'use strict';

  const headerTop = document.querySelector('.header__top');
  const header = document.querySelector('.header');
  const headerHeight = header.getBoundingClientRect().height;
  const stickyNav = function (entries) {
    const [entry] = entries;
    headerTop.classList.toggle('sticky', !entry.isIntersecting);
  };
  const headerObserver = new IntersectionObserver(stickyNav, {
    root: null,
    threshold: 0,
    rootMargin: `${headerHeight}px`
  });
  headerObserver.observe(header);
})();
(function () {
  'use strict';

  ///////////////////// DROPDOWN MENU & NO SCROLLING
  const body = document.querySelector("body");
  const navBox = document.querySelector('#nav-toggle');
  const nav = document.querySelector('.nav');
  const dropMenu = function () {
    if (this.checked) {
      nav.classList.add("reveal");
      body.classList.add('u-overflow-hidden');
    } else {
      nav.classList.remove("reveal");
      body.classList.remove('u-overflow-hidden');
    }
  };
  navBox.addEventListener('change', dropMenu);
  window.onload = function () {
    navBox.checked = false;
    if (body.classList.contains('u-overflow-hidden')) body.classList.remove('u-overflow-hidden');
    if (nav.classList.contains('reveal')) nav.classList.remove('reveal');
  };

  // FROM CSS TRICKS
  // https://css-tricks.com/stop-animations-during-window-resizing/

  let resizeTimer;
  window.addEventListener("resize", () => {
    console.log('resized');
    document.body.classList.add("u-resize-animation-stopper");
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      document.body.classList.remove("u-resize-animation-stopper");
    }, 400);
  });
})();
}();
/******/ })()
;
//# sourceMappingURL=index.js.map