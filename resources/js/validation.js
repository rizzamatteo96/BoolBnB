window.validateEmail = function(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    alert("Valid email address!");
    document.registerForm.email.focus();
    return true;
  } else {
    alert("Invalid email address!");
    document.registerForm.email.focus();
    return false;
  }
}