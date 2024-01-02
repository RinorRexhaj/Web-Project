const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");
const links = document.querySelectorAll(".links");
const userLogin = document.querySelector(".user__login");
const logoutBtn = document.querySelector(".logoutBtn");
const dashboardBtn = document.querySelector(".dashboardBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
  userLogin.addEventListener("click", (e) => {
    links.forEach((link) => {
      link.style.visibility = "hidden";
    });
    e.stopPropagation();
    userLogin.style.position = "absolute";
    userLogin.style.top = "20px";
    userLogin.style.left = "20px";
    logoutBtn.style.left = "10px";
    logoutBtn.style.top = "20px";
    dashboardBtn.style.left = "10px";
  });
});
