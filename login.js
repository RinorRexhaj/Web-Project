const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

const email = document.getElementById("email");
const password = document.getElementById("password");
const errorEmail = document.querySelector(".error-email");
const errorPassword = document.querySelector(".error-password");
const submit = document.getElementById("submit");

submit.addEventListener("click", (e) => {
  e.preventDefault();
  errorEmail.innerText = "";
  errorPassword.innerText = "";

  if (email.value == "") {
    errorEmail.innerText = "Ju lutem shtoni email-in";
    email.focus();
    return;
  }
  if (password.value == "") {
    errorPassword.innerText = "Ju lutem shtoni passwordin";
    password.focus();
    return;
  }

  if (!emailValid(email.value)) {
    errorEmail.innerText = "Formati i email-it eshte invalid!";
    email.focus();
    return;
  }

  if (!passwordValid(password.value)) {
    errorPassword.innerText = "Formati i password-it eshte invalid!";
    password.focus();
    return;
  }

  window.location = "/home.html";
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
