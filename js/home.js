const header = document.querySelector("header");

//Complete respective input when one of them is complete
const destHotel = document.querySelector(
  ".search__holiday--inputs .search input"
);
const checkIn = document.querySelector(".date input[name='d1']");
const checkOut = document.querySelector(".date input[name='d2']");
const sHBtn = document.querySelector(".search__holiday--button");

const whereTo = document.querySelector(".where_to input");
const flyingFrom = document.querySelector(".flying_from input");
const when = document.querySelector(".when input");
const howLong = document.querySelector(".how_long select");

function completeOther(input1, input2) {
  input2.value = input1.value;
}

destHotel.addEventListener("input", () => completeOther(destHotel, whereTo));
whereTo.addEventListener("input", () => completeOther(whereTo, destHotel));

checkIn.addEventListener("change", () => {
  completeOther(checkIn, when);
  if (howLong.value != "" && checkIn.value != "") {
    let checkOutDay = new Date(checkIn.value);
    checkOutDay.setDate(checkOutDay.getDate() + Number(howLong.value));
    checkOut.value = checkOutDay.toISOString().split("T")[0];
  }
});

when.addEventListener("change", () => {
  completeOther(when, checkIn);
  if (howLong.value != "" && checkIn.value != "") {
    let checkOutDay = new Date(checkIn.value);
    checkOutDay.setDate(checkOutDay.getDate() + Number(howLong.value));
    checkOut.value = checkOutDay.toISOString().split("T")[0];
  }
});

checkOut.addEventListener("change", () => {
  let checkInDay = new Date(checkIn.value);
  let checkOutDay = new Date(checkOut.value);
  if (checkInDay > checkOutDay) {
    checkOut.value = "";
    return;
  }
  if (checkIn.value != "") {
    let diff = (checkOutDay - checkInDay) / 60 / 60 / 24 / 1000;
    if (diff > 7) {
      howLong.value = "other";
      howLong.innerHTML = diff;
    }
    howLong.value = diff;
  }
});

howLong.addEventListener("change", () => {
  let checkInDay = new Date(checkIn.value);
  let checkOutDay = new Date(checkOut.value);
  if (checkInDay > checkOutDay) {
    checkOut.value = "";
    return;
  }
  if (checkIn.value == "" && checkOut.value != "") {
    checkInDay.setDate(checkOutDay.getDate() - Number(howLong.value));
    checkIn.value = checkOutDay.toISOString().split("T")[0];
  } else if (checkIn.value != "" && checkOut.value == "") {
    checkOutDay.setDate(checkOutDay.getDate() + Number(howLong.value));
    checkOut.value = checkOutDay.toISOString().split("T")[0];
  } else if (checkIn.value != "" && checkOut.value != "") {
  }
});

sHBtn.addEventListener("click", () => {});

//Footer links scroll into sections
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
