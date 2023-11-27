const header = document.querySelector("header");
const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

/* Stick the Navbar to the top of the page after scrolling */
// window.addEventListener("scroll", () => {
//   let scroll = this.scrollY;
//   if (scroll > 250) {
//     header.classList.add("scroll");
//   } else {
//     header.classList.remove("scroll");
//   }
// });

const canyon = document.querySelector(".canyon");
const banner = document.querySelector(".search__holiday");
const travelPlanning = document.querySelector(".travel__planning--label-info");
const destinations = document.querySelector(".dicover__destinations");
const newsletter = document.querySelector(".newsletter");
const travelDeals = document.querySelector(".travel__deals");

const explore = document.querySelector(".explore");
const method = document.querySelector(".method");
const dest = document.querySelector(".dest");
const news = document.querySelector(".news");
const deals = document.querySelector(".deals");
const getThere = document.querySelector(".get-there");

explore.addEventListener("click", () => {
  scroll(header);
});

method.addEventListener("click", () => {
  scroll(travelPlanning);
});

dest.addEventListener("click", () => {
  scroll(destinations);
});

getThere.addEventListener("click", () => {
  scroll(destinations);
});

news.addEventListener("click", () => {
  scroll(newsletter);
});

deals.addEventListener("click", () => {
  scroll(travelDeals);
});

function scroll(element) {
  element.scrollIntoView({ behavior: "smooth", block: "center" });
}
