var loginElement = document.getElementById("loginButton");
var emailElement = document.getElementById("email");
var formElement = document.getElementById("loginForm");
var passwordElement = document.getElementById("password");
var emailValid;
var passlen;

loginElement.addEventListener("click", function () {
  validateEmail();
  Passwordlen()
  if(!emailValid){
    var element = document.getElementById("validemail");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("validemail");
    element.classList.remove("alert-danger");
  }
  if(!passlen){
    var element = document.getElementById("passw");
    element.classList.add("alert-danger");
    element.classList.add("alert");
  }else{
    var element = document.getElementById("passw");
    element.classList.remove("alert-danger");
  }

  if(emailValid && passlen){
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

function Passwordlen() {
  passlen = false;
  if (passwordElement.value.length > 5) {
    passlen = true;
  }
}