/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
window.validateEmail = function (input) {
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    document.registerForm.email.focus();
    return true;
  } else {
    alert("Invalid email address!");
    document.registerForm.email.focus();
    return false;
  }
};

window.prova = function () {
  console.log('ciao');
};
/******/ })()
;