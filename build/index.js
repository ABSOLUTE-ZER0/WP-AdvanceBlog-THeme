(window["webpackJsonp_advancedblog"] = window["webpackJsonp_advancedblog"] || []).push([["style-index"],{

/***/ "./sass/style.scss":
/*!*************************!*\
  !*** ./sass/style.scss ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"index": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
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
/******/ 	var jsonpArray = window["webpackJsonp_advancedblog"] = window["webpackJsonp_advancedblog"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/index.js","style-index"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../sass/style.scss */ "./sass/style.scss");
/* harmony import */ var _modules_Funtionality__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/Funtionality */ "./src/modules/Funtionality.js");
/* harmony import */ var _modules_OnclickFunctions__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/OnclickFunctions */ "./src/modules/OnclickFunctions.js");
 // Our modules / classes


 // Instantiate a new object using our modules/classes

const funtionality = new _modules_Funtionality__WEBPACK_IMPORTED_MODULE_1__["default"]();
const onclickFunctions = new _modules_OnclickFunctions__WEBPACK_IMPORTED_MODULE_2__["default"]();

/***/ }),

/***/ "./src/modules/Funtionality.js":
/*!*************************************!*\
  !*** ./src/modules/Funtionality.js ***!
  \*************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class Funtionality {
  // set theme initially
  constructor() {
    this.startingActions();
    this.scrollUp();
  }

  startingActions() {
    const slideshow__carousel = document.querySelector(".slideshow__carousel-data");
    if (slideshow__carousel) slideshow__carousel.classList.add("active");
    var count = 0;

    if (!localStorage.getItem("darkMode")) {
      console.log("set");
      localStorage.setItem("darkMode", "false");
    } else if (count == 0) {
      if (localStorage.getItem("darkMode") == "true") {
        switchDarkMode();
      } else {
        switchLightMode();
      }

      count = 1;
    }
  }

  // scroll functions
  scrollUp() {
    const logo = document.getElementById("header__logo");
    const scrollElement = document.querySelector(".scroll");
    const headerElement = document.querySelector(".header");
    window.addEventListener("scroll", () => {
      scrollElement.classList.toggle("active", window.scrollY > 200); //check header scroll

      headerElement.classList.toggle("active", window.scrollY > 0);
      headerElement.classList.toggle("one-edge-shadow", window.scrollY > 0);
      if (logo) logo.src = window.scrollY > 80 ? "images/logo-dark.png" : "images/logo-light.png";
    });

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: "smooth"
      });
    }

    let stopScrolling = false;
    window.addEventListener("touchmove", handleTouchMove, {
      passive: false
    });

    function handleTouchMove(e) {
      if (!stopScrolling) {
        return;
      }

      e.preventDefault();
    }

    scrollElement.addEventListener("click", () => {
      scrollToTop();
    });
  }

  // remove html tags from comments
  removeHTML(content) {
    var clean = content.textContent || content.innerText;
    console.log(clean);
    return clean;
  }

}

/* harmony default export */ __webpack_exports__["default"] = (Funtionality);

/***/ }),

/***/ "./src/modules/OnclickFunctions.js":
/*!*****************************************!*\
  !*** ./src/modules/OnclickFunctions.js ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class OnclickFunctions {
  constructor() {
    this.searchIcon = document.querySelector(".header__nav--links__search-container");
    this.searchCloseIcon = document.querySelector(".header__overlay-search--line");
    this.menuToggleIcon = document.querySelector(".header__menu");
    this.sidebarRecent = document.querySelector(".sidebar__posts-tabs-recents");
    this.sidebarPopular = document.querySelector(".sidebar__posts-tabs-popular");
    this.sidebarComments = document.querySelector(".sidebar__posts-tabs-comments");
    this.sidebarTags = document.querySelector(".sidebar__posts-tabs-tags");
    this.events();
  }

  events() {
    this.searchIcon.addEventListener("click", () => {
      this.addSearch();
    });
    this.searchCloseIcon.addEventListener("click", () => {
      this.removeSearch();
    });
    this.menuToggleIcon.addEventListener("click", () => {
      this.menuToggle();
    });
    this.sidebarRecent.addEventListener("click", () => {
      this.sidebarPosts("recents");
    });
    this.sidebarPopular.addEventListener("click", () => {
      this.sidebarPosts("popular");
    });
    this.sidebarComments.addEventListener("click", () => {
      this.sidebarPosts("comments");
    });
    this.sidebarTags.addEventListener("click", () => {
      this.sidebarPosts("tags");
    });
  } // menu toggle


  menuToggle(type = "none") {
    const header = document.querySelector(".header");
    const menu = document.querySelector(".header__menu");
    const overlay = document.querySelector(".header__overlay");
    let htmlElement = document.documentElement;

    if (type === "add") {
      menu.classList.add("open");
      header.classList.add("open");
      overlay.classList.add("open");
      htmlElement.classList.add("noscroll");
    } else if (type === "remove") {
      menu.classList.remove("open");
      header.classList.remove("open");
      overlay.classList.remove("open");
      htmlElement.classList.remove("noscroll");
    } else {
      menu.classList.toggle("open");
      header.classList.toggle("open");
      overlay.classList.toggle("open");
      htmlElement.classList.toggle("noscroll");
    }
  } //add search overlay


  addSearch() {
    const search = document.querySelector("#header__search");
    let checkboxSearch = document.querySelector(".header__overlay-search");
    let htmlElement = document.documentElement;
    this.menuToggle("remove");
    checkboxSearch.classList.add("open");
    htmlElement.classList.add("noscroll");
    search.focus();
  } //remove search overlay


  removeSearch() {
    let checkboxSearch = document.querySelector(".header__overlay-search");
    let htmlElement = document.documentElement;
    checkboxSearch.classList.remove("open");
    htmlElement.classList.remove("noscroll");
  } //set sidebas posts


  sidebarPosts(name) {
    const sidebarTabsAll = document.querySelectorAll(".sidebar__posts-tabs>a");
    const sidebarContentAll = document.querySelectorAll(".sidebar__posts-content>div");
    sidebarTabsAll.forEach(element => {
      element.classList.remove("active");
    });
    sidebarContentAll.forEach(element => {
      element.classList.remove("active");
    });

    if (name == "recents") {
      let sidebar = document.querySelector(".sidebar__posts-tabs-recents");
      let sidebarContent = document.querySelector(".sidebar__posts-content-recent");
      sidebar.classList.add("active");
      sidebarContent.classList.add("active");
    }

    if (name == "popular") {
      let sidebar = document.querySelector(".sidebar__posts-tabs-popular");
      sidebar.classList.add("active");
      let sidebarContent = document.querySelector(".sidebar__posts-content-popular");
      sidebarContent.classList.add("active");
    }

    if (name == "comments") {
      let sidebar = document.querySelector(".sidebar__posts-tabs-comments");
      sidebar.classList.add("active");
      let sidebarContent = document.querySelector(".sidebar__posts-content-comments");
      sidebarContent.classList.add("active");
    }

    if (name == "tags") {
      let sidebar = document.querySelector(".sidebar__posts-tabs-tags");
      sidebar.classList.add("active");
      let sidebarContent = document.querySelector(".sidebar__posts-content-tags");
      sidebarContent.classList.add("active");
    }
  }

}

/* harmony default export */ __webpack_exports__["default"] = (OnclickFunctions);

/***/ })

/******/ });
//# sourceMappingURL=index.js.map