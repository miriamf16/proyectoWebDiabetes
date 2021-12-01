(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_courses_jsx"],{

/***/ "./resources/js/Components/quiz.jsx":
/*!******************************************!*\
  !*** ./resources/js/Components/quiz.jsx ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }




var Quiz = function Quiz(_ref) {
  var quiz = _ref.quiz;
  var quizArray = Object.entries(quiz);
  console.log(quiz);
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", null, quizArray.map(function (_ref2) {
    var _ref3 = _slicedToArray(_ref2, 2),
        key = _ref3[0],
        value = _ref3[1];

    if (key == 'name') {
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("h3", {
        key: key,
        className: "pt-3 text-center text-gray-900"
      }, value);
    } else if (key.includes('question')) {
      return Object.entries(value).reverse().map(function (_ref4) {
        var _ref5 = _slicedToArray(_ref4, 2),
            key = _ref5[0],
            value = _ref5[1];

        if (key.includes('questionName')) {
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("h5", {
            key: key,
            className: "pt-4 px-2"
          }, value);
        } else if (key.includes('response')) {
          console.log("key", key);
          console.log("value", value);
          return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
            className: "mx-4 mb-3"
          }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("label", {
            className: "inline-flex items-center"
          }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("input", {
            type: "radio",
            className: "form-radio",
            name: "test",
            value: value['cheked']
          }), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("span", {
            className: "ml-2"
          }, value['response'])));
        }
      });
    }
  }));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Quiz);

/***/ }),

/***/ "./resources/js/Pages/courses.jsx":
/*!****************************************!*\
  !*** ./resources/js/Pages/courses.jsx ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "./node_modules/react/index.js");
/* harmony import */ var _inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @inertiajs/inertia-react */ "./node_modules/@inertiajs/inertia-react/dist/index.js");
/* harmony import */ var _Components_quiz__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../Components/quiz */ "./resources/js/Components/quiz.jsx");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }








var Courses = function Courses() {
  var course = (0,_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.usePage)().props.course;
  document.querySelector('#app').removeAttribute('data-page');
  var materialCourse = JSON.parse(course[0].material); // console.log(course[0]);

  console.log(materialCourse);

  var _useState = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)(''),
      _useState2 = _slicedToArray(_useState, 2),
      item = _useState2[0],
      setItem = _useState2[1];

  var _useState3 = (0,react__WEBPACK_IMPORTED_MODULE_0__.useState)({}),
      _useState4 = _slicedToArray(_useState3, 2),
      quiz = _useState4[0],
      setQuiz = _useState4[1];

  var onClickMaterial = function onClickMaterial() {
    var item = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '';

    if (item.includes('view') && item.includes('drive.google')) {
      item = item.replace('view', 'preview');
    }

    setItem(item);
  };

  var onClickQuiz = function onClickQuiz(quizItem) {
    setItem('');
    setQuiz(quizItem);
  };

  (0,react__WEBPACK_IMPORTED_MODULE_0__.useEffect)(function () {
    document.title = 'Health 101 - ' + course[0].name_EN;
  }, [item, quiz]);
  return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "min-h-screen"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("nav", {
    className: "bg-white border-b border-gray-100"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "max-w-7xl mx-auto px-4 sm:px-6 lg:px-80"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "flex justify-between h-16"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "flex"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "flex-shrink-0 flex items-center"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(_inertiajs_inertia_react__WEBPACK_IMPORTED_MODULE_1__.InertiaLink, {
    className: "navbar-brand text-gray-800",
    href: "\\"
  }, "Come balanceado")), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "hidden space-x-0 sm:-my-px sm:ml-10 sm:flex"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("a", {
    href: "/dashboard",
    className: "no-underline inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition"
  }, "Dashboard")))))), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("header", {
    className: "bg-white shadow"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("h2", {
    className: "font-semibold text-xl text-gray-800 leading-tight text-center"
  }, course[0].name_EN))), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("main", {
    className: "py-3"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "max-w-7xl mx-auto sm:px-6 lg:px-8"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "bg-white overflow-hidden shadow-xl sm:rounded-lg"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("section", {
    className: "grid grid-rows-1 grid-cols-1 md:grid-cols-course gap-2"
  }, item ? /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("iframe", {
    className: "p-1 w-full min-h-80",
    src: item,
    frameBorder: "0"
  }) : Object.keys(quiz).length > 0 ? /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement(_Components_quiz__WEBPACK_IMPORTED_MODULE_2__.default, {
    quiz: quiz
  }) : /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("div", {
    className: "p-1 w-full min-h-80"
  }, /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("h2", {
    className: "pt-4 text-center text-blue-500"
  }, "Welcome to ", course[0].name_EN, " course")), /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("section", {
    className: "bg-gray-100 p-2"
  }, materialCourse.map(function (x) {
    if (x.type == 'material') {
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("button", {
        className: "block w-full p-2 bg-gray-300 shadow-sm rounded mb-2 font-bold",
        onClick: function onClick() {
          onClickMaterial(x.link);
        }
      }, x.name);
    } else {
      return /*#__PURE__*/react__WEBPACK_IMPORTED_MODULE_0__.createElement("button", {
        className: "block w-full p-2 bg-gray-300 shadow-sm rounded mb-2 font-bold",
        onClick: function onClick() {
          onClickQuiz(x);
        }
      }, x.name);
    }
  })))))));
};

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Courses);

/***/ })

}]);