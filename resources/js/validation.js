window.validateEmail = function(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    // document.registerForm.email.focus();
    return true;
  } else {
    alert("Invalid email address!");
    // document.registerForm.email.focus();
    return false;
  }
};

window.verifyPassword = function(input) {
  // Define params
  var myparams = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

  // Define input password
  var userPassword = input.value;

  // Validate password
  if(userPassword.match(myparams)){  
    return true;
  } else {
    document.getElementById('validation-password').innerHTML = 'Password must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character and should be between 8 and 15 characters';
    return false;
  }
};

window.verifyPasswordOnSubmit = function(input) {
  // Define params
  var myparams = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

  // Define input password
  var userPassword = input.value;

  // Validate password
  if(!userPassword.match(myparams)){
    alert('Invalid password');
    return false;
  }
};