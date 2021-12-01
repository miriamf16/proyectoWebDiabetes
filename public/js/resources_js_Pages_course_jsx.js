(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_course_jsx"],{

/***/ "./resources/js/Pages/course.jsx":
/*!***************************************!*\
  !*** ./resources/js/Pages/course.jsx ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");



var Course = function Course() {
  var _usePage$props = (0,_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.usePage)().props(),
      course = _usePage$props.course;

  console.log(course);
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", null, "prueba");
};

Course.layout = function (page) {
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(Layout, {
    children: page,
    title: 'Health 101'
  });
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Course);

/***/ })

}]);