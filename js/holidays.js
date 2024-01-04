const modal = document.querySelector(".modal");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".btn--close-modal");
const btnsOpenModal = document.querySelectorAll(".btn--show-modal");

const toggleModal = function (e) {
  e.preventDefault();
  modal.classList.toggle("hidden");
  overlay.classList.toggle("hidden");
};

btnsOpenModal.forEach((btn) => {
  btn.addEventListener("click", toggleModal);
});

btnCloseModal.addEventListener("click", toggleModal);
overlay.addEventListener("click", toggleModal);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
  }
});
