const form = document.querySelector(".message");
const textarea = document.querySelector("textarea");

form.addEventListener("submit", (e) => {
  if (textarea.value == "") {
    e.preventDefault();
    textarea.placeholder = "The Message Can't Be Empty...";
    return;
  }
});

//Modal on successful message
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
