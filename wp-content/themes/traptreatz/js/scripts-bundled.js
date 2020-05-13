/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./wp-content/themes/traptreatz/js/scripts.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./wp-content/themes/traptreatz/js/modules/SideMenu.js":
/*!*************************************************************!*\
  !*** ./wp-content/themes/traptreatz/js/modules/SideMenu.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar SideMenu =\n/*#__PURE__*/\nfunction () {\n  function SideMenu() {\n    _classCallCheck(this, SideMenu);\n\n    this.sideMenu = document.getElementById(\"side-menu\");\n    this.openButton = document.getElementById(\"side-navbar-open\");\n    this.closeButton = document.getElementById(\"side-navbar-close\");\n    this.events();\n  }\n\n  _createClass(SideMenu, [{\n    key: \"events\",\n    value: function events() {\n      this.openButton.addEventListener(\"click\", this.openMenu.bind(this));\n      this.closeButton.addEventListener(\"click\", this.closeMenu.bind(this));\n    }\n  }, {\n    key: \"openMenu\",\n    value: function openMenu(event) {\n      event.preventDefault();\n      this.sideMenu.classList.remove(\"hide-menu\");\n      this.sideMenu.classList.add(\"show-menu\");\n    }\n  }, {\n    key: \"closeMenu\",\n    value: function closeMenu(event) {\n      event.preventDefault();\n      this.sideMenu.classList.remove(\"show-menu\");\n      this.sideMenu.classList.add(\"hide-menu\");\n    }\n  }]);\n\n  return SideMenu;\n}();\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (SideMenu);\n\n//# sourceURL=webpack:///./wp-content/themes/traptreatz/js/modules/SideMenu.js?");

/***/ }),

/***/ "./wp-content/themes/traptreatz/js/modules/SmoothScroll.js":
/*!*****************************************************************!*\
  !*** ./wp-content/themes/traptreatz/js/modules/SmoothScroll.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\n\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }\n\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }\n\nvar SmoothScroll =\n/*#__PURE__*/\nfunction () {\n  function SmoothScroll() {\n    _classCallCheck(this, SmoothScroll);\n\n    this.menuLink = document.querySelector('.menu-link');\n    this.ourStoryLink = document.querySelector('.our-story-link');\n    this.ourStoryTarget = document.getElementById('our-story');\n    this.menuTarget = document.getElementById('product-menu');\n    this.events();\n  } // Event listeners\n\n\n  _createClass(SmoothScroll, [{\n    key: \"events\",\n    value: function events() {\n      this.ourStoryLink.addEventListener('click', this.scrollToStory.bind(this));\n    }\n  }, {\n    key: \"scrollToStory\",\n    value: function scrollToStory() {\n      console.log('I was clicked');\n      this.ourStoryTarget.scrollIntoView({\n        behavior: \"smooth\",\n        block: \"start\",\n        inline: \"nearest\"\n      });\n      console.log(this.ourStoryTarget);\n    }\n  }]);\n\n  return SmoothScroll;\n}();\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (SmoothScroll);\n\n//# sourceURL=webpack:///./wp-content/themes/traptreatz/js/modules/SmoothScroll.js?");

/***/ }),

/***/ "./wp-content/themes/traptreatz/js/scripts.js":
/*!****************************************************!*\
  !*** ./wp-content/themes/traptreatz/js/scripts.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _modules_SideMenu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/SideMenu */ \"./wp-content/themes/traptreatz/js/modules/SideMenu.js\");\n/* harmony import */ var _modules_SmoothScroll__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/SmoothScroll */ \"./wp-content/themes/traptreatz/js/modules/SmoothScroll.js\");\n// 3rd party packages from NPM\n// Our modules / classes\n\n // import ClosePopup from './modules/ClosePopup';\n// Instantiate a new object using our modules/classes\n\nvar sideMenu = new _modules_SideMenu__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\nvar smoothScroll = new _modules_SmoothScroll__WEBPACK_IMPORTED_MODULE_1__[\"default\"](); // let closePopup = new ClosePopup();\n\n//# sourceURL=webpack:///./wp-content/themes/traptreatz/js/scripts.js?");

/***/ })

/******/ });