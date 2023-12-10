const header = document.querySelector("header");
const nav = document.querySelector("nav");
const menu = document.querySelector(".menu");
const bars = document.querySelector(".menuBtn");

menu.addEventListener("click", () => {
  nav.classList.toggle("active");
});

/* Stick the Navbar to the top of the page after scrolling */
window.addEventListener("scroll", () => {
  let scroll = this.scrollY;
  if (scroll > 400) {
    header.classList.add("scroll");
  } else {
    header.classList.remove("scroll");
  }
});

const canyon = document.querySelector(".canyon");
const banner = document.querySelector(".search__holiday");
const travelPlanningButtons = document.querySelectorAll(
  ".travel__planning--labels button"
);
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
const seeDeals = document.querySelectorAll(".see__deals");
const pick = document.querySelectorAll(".pick");
const viewMore = document.querySelector(".view__more");

explore.addEventListener("click", () => {
  scroll(banner);
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

seeDeals.forEach((sd) => {
  sd.addEventListener("click", () => {
    scroll(travelDeals);
  });
});

viewMore.addEventListener("click", () => {
  scroll(travelDeals);
});

pick.forEach((p) => {
  p.addEventListener("click", () => {
    scroll(travelPlanning);
  });
});

//Scroll into Page View function
function scroll(element) {
  element.scrollIntoView({ behavior: "smooth", block: "center" });
}

//Select only one button at a time
travelPlanningButtons.forEach((tBtn) => {
  tBtn.addEventListener("click", () => {
    travelPlanningButtons.forEach((tB) => {
      if (tB.classList.contains("selected")) tB.classList.remove("selected");
    });
    tBtn.classList.add("selected");
  });
});

// slideShow
const slides = document.querySelectorAll(".image__container");
const btnLeft = document.querySelector(".slider__btn--left");
const btnRight = document.querySelector(".slider__btn--right");
const dotContainer = document.querySelector(".dots");

let currentSlide = 0;

document.addEventListener("keydown", function (e) {
  if (e.key === "ArrowLeft") prevSlide();
  if (e.key === "ArrowRight") nextSlide();
});

//Dots
const createDots = function () {
  slides.forEach((_, i) => {
    dotContainer.insertAdjacentHTML(
      "beforeend",
      `<button class="dots__dot" data-slide="${i}"></button>`
    );
  });
};
createDots();

const dotsbtn = document.querySelectorAll(".dots__dot");

dotContainer.addEventListener("click", function (e) {
  if (e.target.classList.contains("dots__dot")) {
    const slide = e.target.dataset.slide;
    goToSlide(slide);
  } else return;
});

const goToSlide = function (curentSlide) {
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(${i - curentSlide}00%)`;
  });
  dotsbtn.forEach((dot) => {
    if (dot.dataset.slide == curentSlide) {
      dot.classList.add("dots__dot--active");
    } else {
      dot.classList.remove("dots__dot--active");
    }
  });
};

//nfillim slideShowi par eshte slide par
goToSlide(0);
// 0%, 100%, 200%, 300%, 400%

const nextSlide = function () {
  currentSlide++;
  // console.log(curentSlide);
  if (currentSlide == 5) currentSlide = 0;
  goToSlide(currentSlide);
};

const prevSlide = function () {
  currentSlide--;
  // console.log(curentSlide);
  if (currentSlide == -1) currentSlide = 4;
  goToSlide(currentSlide);
};
btnRight.addEventListener("click", nextSlide);

btnLeft.addEventListener("click", prevSlide);
