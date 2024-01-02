const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");
const links = document.querySelectorAll(".links");
const userLogin = document.querySelector(".user__login");
const user = document.querySelector(".user");
const userInfo = document.querySelector(".user_info");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

user.addEventListener("click", () => {
  userInfo.classList.toggle("clicked");
});
