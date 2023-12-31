const email = document.getElementById("email");
const password = document.getElementById("password");
const errorEmail = document.querySelector(".error-email");
const errorPassword = document.querySelector(".error-password");
const submit = document.getElementById("submit");
const loginForm = document.getElementById("login");

loginForm.addEventListener("submit", (e) => {
  errorEmail.innerText = "";
  errorPassword.innerText = "";

  if (email.value == "") {
    e.preventDefault();
    errorEmail.innerText = "Ju lutem shtoni email-in";
    email.focus();
    return;
  }

  if (password.value == "") {
    e.preventDefault();
    errorPassword.innerText = "Ju lutem shtoni passwordin";
    password.focus();
    return;
  }

  if (!emailValid(email.value)) {
    e.preventDefault();
    errorEmail.innerText = "Formati i email-it eshte invalid!";
    email.focus();
    return;
  }

  if (!passwordValid(password.value)) {
    e.preventDefault();
    errorPassword.innerText = "Formati i password-it eshte invalid!";
    password.focus();
    return;
  }

  // window.location = "./home.php";
});

const emailValid = (email) => {
  const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
  return emailRegex.test(email.toLowerCase());
};

const passwordValid = (psw) => {
  const numberRegex = /\d/;
  if (psw.length < 8 || !numberRegex.test(psw)) {
    return false;
  }
  return true;
};

// register
const perdoruesi = document.getElementById("perdoruesi");
const emri = document.getElementById("emri");
const emaili = document.getElementById("emaili");
const passwordi = document.getElementById("passwordi");
const errorPerdoruesi = document.querySelector(".error-perdoruesi");
const errorEmri = document.querySelector(".error-emri");
const errorEmaili = document.querySelector(".error-emaili");
const errorPasswordi = document.querySelector(".error-passwordi");
const registerForm = document.getElementById("register");

registerForm.addEventListener("submit", (e) => {
  errorPerdoruesi.innerText = "";
  errorEmri.innerText = "";
  errorEmaili.innerText = "";
  errorPasswordi.innerText = "";

  if (perdoruesi.value == "") {
    e.preventDefault();
    errorPerdoruesi.innerText = "Ju lutem shtoni emrin e userit";
    perdoruesi.focus();
    return;
  }

  if (emri.value == "") {
    e.preventDefault();
    errorEmri.innerText = "Ju lutem shtoni emrin dhe mbiemrin";
    emri.focus();
    return;
  }

  if (emaili.value == "") {
    e.preventDefault();
    errorEmaili.innerText = "Ju lutem shtoni email-in";
    emaili.focus();
    return;
  }

  if (passwordi.value == "") {
    e.preventDefault();
    errorPasswordi.innerText = "Ju lutem shtoni passwordin";
    passwordi.focus();
    return;
  }

  if (!emailiValid(emaili.value)) {
    e.preventDefault();
    errorEmaili.innerText = "Formati i email-it eshte invalid!";
    emaili.focus();
    return;
  }

  if (!passwordiValid(passwordi.value)) {
    e.preventDefault();
    errorPasswordi.innerText = "Formati i password-it eshte invalid!";
    passwordi.focus();
    return;
  }

  // window.location = "./home.html";
});

const emailiValid = (emaili) => {
  const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
  return emailRegex.test(emaili.toLowerCase());
};

const passwordiValid = (psw) => {
  const numberRegex = /\d/;
  if (psw.length < 8 || !numberRegex.test(psw)) {
    return false;
  }
  return true;
};

//when sign up is clicked
const signUpBtn = document.querySelector(".signUpBtn");
const login = document.querySelector(".login");
const register = document.getElementById("register");
const back = document.querySelector(".back");

signUpBtn.addEventListener("click", () => {
  register.classList.toggle("hidden");
  login.classList.toggle("hidden");
});

back.addEventListener("click", () => {
  register.classList.toggle("hidden");
  login.classList.toggle("hidden");
});
