/* Stick the Navbar to the top of the page after scrolling */
window.addEventListener("scroll", () => {
  let scroll = this.scrollY;
  if (scroll > 400) {
    header.classList.add("scroll");
  } else {
    header.classList.remove("scroll");
  }
});
