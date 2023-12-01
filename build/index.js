/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/SmallNav.js":
/*!*********************************!*\
  !*** ./src/modules/SmallNav.js ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class SmallNav {
  constructor() {
    this.body = document.querySelector("body");
    this.navBox = document.querySelector('.hamburger__checkbox');
    this.nav = document.querySelector('.nav');
    this.events();
  }
  events() {
    this.clearNav();
    this.navBox.addEventListener('change', () => this.dropMenu());
    this.nav.addEventListener('click', e => this.resetNav(e));
    this.navBox.checked = false;
  }
  clearNav() {
    this.navBox.checked = false;
    if (this.body.classList.contains('u-overflow-hidden')) this.body.classList.remove('u-overflow-hidden');
    if (this.nav.classList.contains('reveal')) this.nav.classList.remove('reveal');
  }
  dropMenu() {
    if (this.navBox.checked) {
      this.nav.classList.add("reveal");
      this.body.classList.add('u-overflow-hidden');
    } else {
      this.nav.classList.remove("reveal");
      this.body.classList.remove('u-overflow-hidden');
    }
  }
  resetNav(e) {
    if (e.target.closest('li').classList.contains('menu-item')) this.clearNav();
  }
}
/* harmony default export */ __webpack_exports__["default"] = (SmallNav);

/***/ }),

/***/ "./src/modules/StickyNav.js":
/*!**********************************!*\
  !*** ./src/modules/StickyNav.js ***!
  \**********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
class StickyNav {
  constructor() {
    this.headerTop = document.querySelector('.header__top');
    this.header = document.querySelector('.header');
    this.headerHeight = this.header.getBoundingClientRect().height;
    this.options = {
      root: null,
      threshold: 0,
      rootMargin: `${this.headerHeight}px`
    };
    this.navObserver = new IntersectionObserver(this.navStick.bind(this), this.options);
    this.events();
  }
  events() {
    this.navObserver.observe(this.header);
  }
  navStick(entries) {
    const [entry] = entries;
    if (!entry.isIntersecting) {
      this.headerTop.classList.add('sticky');
    } else {
      this.headerTop.classList.remove('sticky');
    }
  }
}
/* harmony default export */ __webpack_exports__["default"] = (StickyNav);

/***/ }),

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
/* harmony import */ var _modules_StickyNav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/StickyNav */ "./src/modules/StickyNav.js");
/* harmony import */ var _modules_SmallNav__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/SmallNav */ "./src/modules/SmallNav.js");



new _modules_StickyNav__WEBPACK_IMPORTED_MODULE_1__["default"]();
new _modules_SmallNav__WEBPACK_IMPORTED_MODULE_2__["default"]();
}();
/******/ })()
;
//# sourceMappingURL=index.js.map