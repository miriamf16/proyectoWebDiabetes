(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_materialCourses_jsx"],{

/***/ "./resources/js/Pages/materialCourses.jsx":
/*!************************************************!*\
  !*** ./resources/js/Pages/materialCourses.jsx ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");


var materialCourse = function materialCourse(_ref) {
  var material = _ref.material;

  if (material.type == 'material') {
    return material.map(function (x) {
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("button", {
        className: "block w-full p-2 bg-blue-300 rounded mb-2 font-bold",
        onClick: function (_onClick) {
          function onClick() {
            return _onClick.apply(this, arguments);
          }

          onClick.toString = function () {
            return _onClick.toString();
          };

          return onClick;
        }(function () {
          onClick(x.link);
        })
      }, x.name);
    });
  } else {
    return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", null);
  }
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (materialCourse);

/***/ })

}]);