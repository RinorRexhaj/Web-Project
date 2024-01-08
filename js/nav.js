const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");
const links = document.querySelectorAll(".links");
const userLogin = document.querySelector(".user__login");
const user = document.querySelector(".user");
const userInfo = document.querySelector(".user_info");
const profileBtn = document.querySelector(".profileBtn");
const dashboardBtn = document.querySelector(".dashboardBtn");
const logoutBtn = document.querySelector(".logoutBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

user.addEventListener("click", () => {
  userInfo.classList.toggle("clicked");
});

const modalLogout = document.querySelector(".modal_logout");
const overlayLogout = document.querySelector(".overlay_logout");
const btnCloseModalLogout = document.querySelector(".btn--close-modal_logout");
const noLogout = document.querySelector(".btn_no");

const toggleModalLogout = function (e) {
  e.preventDefault();
  modalLogout.classList.toggle("hidden");
  overlayLogout.classList.toggle("hidden");
};

logoutBtn.addEventListener("click", toggleModalLogout);

btnCloseModalLogout.addEventListener("click", toggleModalLogout);
overlayLogout.addEventListener("click", toggleModalLogout);
noLogout.addEventListener("click", toggleModalLogout);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    modalLogout.classList.add("hidden");
    overlayLogout.classList.add("hidden");
  }
});
