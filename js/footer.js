//Newsletter Validation
const newsLetterFormFooter = document.querySelector(".enter--email");
const newsLetterInputFooter = document.querySelector(".enter--email input");

newsLetterFormFooter.addEventListener("submit", (e) => {
  if (
    newsLetterInputFooter.value == "" ||
    !emailValidFooter(newsLetterInputFooter.value)
  ) {
    e.preventDefault();
    newsLetterInputFooter.focus();
    newsLetterInputFooter.placeholder = "Enter correct e-mail";
  }
});

const emailValidFooter = (email) => {
  const emailRegex = /^([A-Za-z0-9_\-.])+@([A-Za-z0-9_\-.])+\.([A-Za-z]{2,4})$/;
  return emailRegex.test(email.toLowerCase());
};
