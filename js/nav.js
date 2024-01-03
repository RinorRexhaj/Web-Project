const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");
const links = document.querySelectorAll(".links");
const userLogin = document.querySelector(".user__login");
const user = document.querySelector(".user");
const userInfo = document.querySelector(".user_info");
const profileBtn = document.querySelector(".profileBtn");
const dashboardBtn = document.querySelector(".dashboardBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

user.addEventListener("click", () => {
  userInfo.classList.toggle("clicked");
});

dashboardBtn.addEventListener("click", () => {
  window.location.href = "./dashboard.php";
});

profileBtn.addEventListener("click", () => {
  window.location.href = "./profile.php";
});
