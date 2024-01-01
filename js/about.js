const header = document.querySelector("header");
const banner = document.querySelector(".banner");

const prEl = document.querySelector(".about__text--section");
const offerEl = document.querySelector(".what-we-offer-section");
const locationEl = document.querySelector(".location");

const aboutUs = document.querySelector(".about-us");
const priorities = document.querySelector(".priorities");
const offer = document.querySelector(".offer");
const ourLocation = document.querySelector(".our-location");

aboutUs.addEventListener("click", () => {
  scroll(banner);
});

priorities.addEventListener("click", () => {
  scroll(prEl);
});

offer.addEventListener("click", () => {
  scroll(offerEl);
});

ourLocation.addEventListener("click", () => {
  scroll(locationEl);
});

function scroll(element) {
  element.scrollIntoView({ behavior: "smooth", block: "center" });
}
