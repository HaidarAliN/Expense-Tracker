// DOM Elements
var emailElement = document.getElementById("email");
var passwordElement = document.getElementById("password");
var confirmPasswordElement = document.getElementById("confirmPassword");
var submitElement = document.getElementById("submitButton");
var formElement = document.getElementById("signupForm");
var fnameElement = document.getElementById("first_name1");
var lnameElement = document.getElementById("last_name1");

var emailValid;
var confirmPass;
var fnameValid;
var lnameValid;
// Listeners


submitElement.addEventListener("click", function () {
  validateEmail();
  confirmPassword();
  validatefname();
  validatelname();


  if(!confirmPass){
    var element = document.getElementById("cpass");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("cpass");
    element.classList.remove("alert-danger");
  }

  if(!emailValid){
    var element = document.getElementById("validemail");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("validemail");
    element.classList.remove("alert-danger");
  }

  if(!fnameValid){
    var element = document.getElementById("fn");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("fn");
    element.classList.remove("alert-danger");
  }

  if(!lnameValid){
     var element = document.getElementById("ln");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("ln");
    element.classList.remove("alert-danger");
  }

  if (emailValid && confirmPass && fnameValid && lnameValid) {
    formElement.submit();
  }
});

function validateEmail() {
  var emailValue = emailElement.value;
  emailValid = false;
  if (
    emailValue.length > 5 &&
    emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
    emailValue.lastIndexOf("@") != -1
  ) {
    emailValid = true;
  }
}

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.value == confirmPasswordElement.value && passwordElement.value.length > 5) {
    confirmPass = true;
  }
}



function validatefname(){
  fnameValid = false;
  if(fnameElement.value.length>2){
    fnameValid = true;
  }
}

function validatelname(){
  lnameValid = false;
  if(lnameElement.value.length>2){
    lnameValid = true;
  }
}
