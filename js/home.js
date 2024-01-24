const header = document.querySelector("header");

//Complete respective input when one of them is complete
const holidayForm = document.querySelector(".search__holiday--inputs");
const destHotel = document.querySelector(
  ".search__holiday--inputs .search input"
);
const checkIn = document.querySelector(".date input[name='checkIn']");
const checkOut = document.querySelector(".date input[name='checkOut']");
const from = document.querySelector(".search__holiday--inputs .invisible");
const sHBtn = document.querySelector(".search__holiday--button");

const whereTo = document.querySelector(".where_to input");
const flyingFrom = document.querySelector(".flying_from input");
const when = document.querySelector(".when input");
const howLong = document.querySelector(".how_long select");
const travelPlanningInfo = document.querySelector(
  ".travel__planning--informations"
);

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
      let diffHowLong = document.createElement("option");
      diffHowLong.text = diff + " nights";
      howLong.options.add(diffHowLong, 7);
      howLong[7].selected = "selected";
    } else howLong.value = diff;
  }
});

howLong.addEventListener("change", () => {
  if (howLong.value == "other") {
    scroll(banner);
    checkOut.value = "";
    return;
  }
  let checkInDay = new Date(checkIn.value);
  let checkOutDay = new Date(checkOut.value);
  if (checkInDay > checkOutDay) {
    checkOut.value = "";
    return;
  }
  if (checkIn.value == "" && checkOut.value != "") {
    checkInDay.setDate(checkOutDay.getDate() - Number(howLong.value));
    checkIn.value = checkOutDay.toISOString().split("T")[0];
  } else if (checkIn.value != "") {
    checkOutDay.setDate(checkInDay.getDate() + Number(howLong.value));
    checkOut.value = checkOutDay.toISOString().split("T")[0];
  }
});

flyingFrom.addEventListener("change", () => {
  completeOther(flyingFrom, from);
});

holidayForm.addEventListener("submit", (e) => {
  if (destHotel.value == "") {
    e.preventDefault();
    destHotel.focus();
    scroll(destHotel);
  } else if (checkIn.value == "") {
    e.preventDefault();
    checkIn.focus();
    scroll(checkIn);
  } else if (checkOut.value == "") {
    e.preventDefault();
    checkOut.focus();
    scroll(checkOut);
  } else if (from.value == "") {
    e.preventDefault();
    flyingFrom.focus();
    scroll(flyingFrom);
  }
});

travelPlanningInfo.addEventListener("submit", (e) => {
  e.preventDefault();
  scroll(destHotel);
});

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
const locationSlider = document.querySelectorAll('.title h2');
const viewMore = document.querySelector(".view__more");
const searchHoliday = document.querySelector(".search_holiday");

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

pick.forEach((p, i) => {
  p.addEventListener("click", () => {
    let locationArr = locationSlider[i].innerText.split(' ')
    for(let i = 0; i<locationArr.length; i++) {
      locationArr[i] = locationArr[i].charAt(0) + locationArr[i].slice(1).toLowerCase();
      console.log(locationArr[i]);
    }
    let location = locationArr.join(' ')
    whereTo.value = location;
    completeOther(whereTo, destHotel)
    scroll(travelPlanning);
  });
});

searchHoliday.addEventListener("click", () => scroll(banner));

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

//Newsletter Validation
const newsLetterForm = document.querySelector(".newsletter__input");
const newsLetterInput = document.querySelector(".inp input");

newsLetterForm.addEventListener("submit", (e) => {
  if (newsLetterInput.value == "" || !emailValid(newsLetterInput.value)) {
    e.preventDefault();
    newsLetterInput.focus();
  }
});

const emailValid = (email) => {
  const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
  return emailRegex.test(email.toLowerCase());
};

//Modal on successful reservation
const modal = document.querySelector(".modal_reservation");
const overlay = document.querySelector(".overlay_modal");
const btnCloseModal = document.querySelector(".btn--close-modal");

const toggleModal = function (e) {
  e.preventDefault();
  modal.classList.toggle("hidden");
  overlay.classList.toggle("hidden");
};

btnCloseModal.addEventListener("click", toggleModal);
overlay.addEventListener("click", toggleModal);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
  }
});
