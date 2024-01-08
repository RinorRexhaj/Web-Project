const table = document.querySelectorAll(".table");
const sideBar = document.querySelector(".sidebar");
const sideBtn = document.querySelector(".sidebar button");
const usersbtn = document.querySelector(".usersbtn");
const holidaysbtn = document.querySelector(".holidaysbtn");
const newsletterbtn = document.querySelector(".newsletterbtn");
const contactbtn = document.querySelector(".contactbtn");
const users_dash = document.querySelector(".users_dash");
const holidays_dash = document.querySelector(".holidays_dash");
const newsletter_dash = document.querySelector(".newsletter_dash");
const contact_dash = document.querySelector(".contact_dash");

console.log(sideBtn);
sideBtn.addEventListener("click", () => {
  sideBar.classList.toggle("active_side");
});

table.forEach(function (button) {
  button.addEventListener("click", function () {
    table.forEach(function (btn) {
      btn.classList.remove("current");
    });
    button.classList.add("current");
  });
});

usersbtn.addEventListener("click", function (e) {
  e.preventDefault();
  if (!users_dash.classList.contains("hidden")) {
    return;
  } else {
    users_dash.classList.remove("hidden");
    holidays_dash.classList.add("hidden");
    newsletter_dash.classList.add("hidden");
    contact_dash.classList.add("hidden");
  }
});

holidaysbtn.addEventListener("click", function (e) {
  e.preventDefault();
  if (!holidays_dash.classList.contains("hidden")) {
    return;
  } else {
    users_dash.classList.add("hidden");
    holidays_dash.classList.remove("hidden");
    newsletter_dash.classList.add("hidden");
    contact_dash.classList.add("hidden");
  }
});

newsletterbtn.addEventListener("click", function (e) {
  e.preventDefault();
  if (!newsletter_dash.classList.contains("hidden")) {
    return;
  } else {
    users_dash.classList.add("hidden");
    holidays_dash.classList.add("hidden");
    newsletter_dash.classList.remove("hidden");
    contact_dash.classList.add("hidden");
  }
});

contactbtn.addEventListener("click", function (e) {
  e.preventDefault();
  if (!contact_dash.classList.contains("hidden")) {
    return;
  } else {
    users_dash.classList.add("hidden");
    holidays_dash.classList.add("hidden");
    newsletter_dash.classList.add("hidden");
    contact_dash.classList.remove("hidden");
  }
});
