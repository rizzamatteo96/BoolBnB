


// ************ VALIDATION REGISTER.BLADE.PHP *******************

// user registration validation
window.validateEmail = function(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value.match(validRegex)) {
    document.getElementById('user-email').innerHTML = '';
    return true;
  } else {
    document.getElementById('user-email').innerHTML = 'Il campo e-mail è obbligatorio';
    return false;
  }
};

// user psw validation
window.verifyPassword = function(input) {
  // Define params
  var myparams = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

  // Define input password
  var userPassword = input.value;

  // Validate password
  if(userPassword.match(myparams)){  
    document.getElementById('validation-password').innerHTML = '';
    return true;
  } else {
    document.getElementById('validation-password').innerHTML = 'La password deve avere almeno: una lettera maiuscola, una lettera minuscola, un numero e un carattere speciale, e deve essere di lunghezza compresa tra 8 e 15 caratteri';
    return false;
  }
};

// user confirmation psw validation
window.verifyConfPass = function(password, confPass) {

  var confirm = confPass.value;
  var pass = password.value;

  if(confirm === pass) {

    document.getElementById('validation-ConfPass').innerHTML = '';
    return true;

  } else {

    document.getElementById('validation-ConfPass').innerHTML = 'Le password non coincidono';
    return false;

  }

};


// ************ VALIDATION CREATE.BLADE.PHP *******************

// title validation
window.verifyTitle = function(input) {
  var title = input.value;
  if(title == ''  || title == ' ') {
    document.getElementById('valTitle').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valTitle').innerHTML = '';
    return true;
  }
};

// img validation
window.verifyImg = function(input){
  if(input.value == false){
    document.getElementById('valImg').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valImg').innerHTML = '';
    return true;
  }
};

// description validation
window.verifyDescripton = function(input) {
  var text = input.value;
  if(text == '' || text == null || text == ' ' ) {
    document.getElementById('valDescription').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valDescription').innerHTML = '';
    return true;
  }
};

// rooms validation
window.verifyRooms = function(input) {
  if(input.value == '' || input.value == null || input.value == ' ' || input.value == false){
    document.getElementById('valRooms').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valRooms').innerHTML = '';
    return true;
  }
};

// beds validation
window.verifyBeds = function(input) {
  if(input.value == '' || input.value == null || input.value == ' ' || input.value == false){
    document.getElementById('valBeds').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valBeds').innerHTML = '';
    return true;
  }
};

// bathrooms validation
window.verifyBathrooms = function(input) {
  if(input.value == '' || input.value == null || input.value == ' '){
    document.getElementById('valBathrooms').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valBathrooms').innerHTML = '';
    return true;
  }
};

// SquareMeters validation
window.verifySquareMeters = function(input) {
  if(input.value == '' || input.value == null || input.value == ' ' || input.value == false){
    document.getElementById('valSquareMeters').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valSquareMeters').innerHTML = '';
    return true;
  }
};

// City validation
window.verifyCity = function(input) {
  if(input.value == '' || input.value == ' ') {
    document.getElementById('valCity').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valCity').innerHTML = '';
    return true;
  }
};

// Address validation
window.verifyAddress = function(input) {
  if(input.value == '' || input.value == ' ') {
    document.getElementById('valAddress').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valAddress').innerHTML = '';
    return true;
  }
};

// HouseNum validation
window.verifyHouseNum = function(input) {
  if(input.value == '' || input.value == ' ') {
    document.getElementById('valHouseNum').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valHouseNum').innerHTML = '';
    return true;
  }
};

// PostalCode validation
window.verifyPostalCode = function(input) {
  if(input.value == '' || input.value == ' ') {
    document.getElementById('valPostalCode').innerHTML = 'Campo da compilare';
    return false;
  } else{
    document.getElementById('valPostalCode').innerHTML = '';
    return true;
  }
};

// Remove image on close pop-up
window.removeImg = function(){
  document.getElementById('image').value = null;
}
// display img
window.displayImg = function(event) {
	let image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

// display img if confirmed
// window.displayIfConfirmed = function() {
//   document.getElementById('output-if-confirmed').src = '';
// 	document.getElementById('output-if-confirmed').src = console.log(document.getElementById('image').value);
// };











// ********************************password verification onclick
// window.verifyPasswordOnSubmit = function(input) {
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

// window.verifyConfPassOnSubmit = function(password, confPass) {

//   var confirm = confPass.value;
//   var pass = password.value;

//   // Validate password
//   if(confirm != pass){

//     alert('Password non uguale');

//   }

// }


