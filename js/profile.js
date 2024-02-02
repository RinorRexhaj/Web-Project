const username = document.querySelector("[name='username']");
const fullname = document.querySelector("[name='fullname']");
const email = document.querySelector("[name='email']");
const password = document.querySelector("[name='password']");
const profile = document.querySelector("#profile");
const save = document.querySelector(".save");
const image = document.querySelector(".profile");
const form = document.querySelector("form");

username.addEventListener("input", setVisible);
fullname.addEventListener("input", setVisible);
email.addEventListener("input", setVisible);
password.addEventListener("input", setVisible);
profile.addEventListener("input", (e) => {
  let img = URL.createObjectURL(e.target.files[0]);
  image.src = img;
  setVisible();
});

image.addEventListener("change", (e) => {
  loadFile(e);
});

function setVisible() {
  save.style.visibility = "visible";
}