/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/validation.js ***!
  \************************************/
// ************ VALIDATION REGISTER.BLADE.PHP *******************
window.validateEmail = function (input) {
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    document.getElementById('user-email').innerHTML = '';
    return true;
  } else {
    document.getElementById('user-email').innerHTML = 'Il campo e-mail è obbligatorio';
    return false;
  }
};

window.verifyPassword = function (input) {
  // Define params
  var myparams = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/; // Define input password

  var userPassword = input.value; // Validate password

  if (userPassword.match(myparams)) {
    document.getElementById('validation-password').innerHTML = '';
    return true;
  } else {
    document.getElementById('validation-password').innerHTML = 'La password deve avere almeno: una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale, e deve essere di lunghezza compresa tra 8 e 15 caratteri';
    return false;
  }
}; // window.verifyPasswordOnSubmit = function(input) {
//   // Define params
//   var myparams = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
//   // Define input password
//   var userPassword = input.value;
//   // Validate password
//   if(!userPassword.match(myparams)){
//     alert('Invalid password');
//     return false;
//   }
// };


window.verifyConfPass = function (password, confPass) {
  var confirm = confPass.value;
  var pass = password.value;

  if (confirm === pass) {
    document.getElementById('validation-ConfPass').innerHTML = '';
    return true;
  } else {
    document.getElementById('validation-ConfPass').innerHTML = 'Le password non coincidono';
    return false;
  }
}; // window.verifyConfPassOnSubmit = function(password, confPass) {
//   var confirm = confPass.value;
//   var pass = password.value;
//   // Validate password
//   if(confirm != pass){
//     alert('Password non uguale');
//   }
// }
// ************ VALIDATION CREATE.BLADE.PHP *******************


window.verifyTitle = function (input) {
  var title = input.value;

  if (title == '') {
    document.getElementById('valTitle').innerHTML = 'Campo Vuoto';
    return false;
  } else {
    document.getElementById('valTitle').innerHTML = '';
  }
};

window.verifyDescripton = function (input) {
  var text = input.value;

  if (text == '' || text == null || text == ' ') {
    document.getElementById('valDescription').innerHTML = 'Campo Vuoto';
    return false;
  } else {
    document.getElementById('valDescription').innerHTML = '';
  }
};

window.prova = function (test) {
  console.log(test.value.length);
};
/******/ })()
;