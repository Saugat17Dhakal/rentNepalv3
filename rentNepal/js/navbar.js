const navbarContainer = document.querySelector(".navbar-nav");
window.onscroll = () => {
  navbarContainer.classList.toggle("scroll", window.scrollY > 5);
};
const navBarOpener = document.querySelector(".hamburger-open-close");
navBarOpener.onclick = () => {
  navbarContainer.classList.toggle("active"),
    navbarContainer.classList.contains("active")
      ? ((navBarOpener.innerHTML = "x"),
        (document.body.style.overflowY = "hidden"))
      : ((navBarOpener.innerHTML = "&#9776;"),
        (document.body.style.overflowY = "scroll"));
};
let currentDate = new Date(),
  currentYear = currentDate.getFullYear();
document.querySelector(".date").innerHTML = currentYear;
