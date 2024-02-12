const prevBtn = document.querySelectorAll(".next"),
  nextBtn = document.querySelectorAll(".prev");
let itemsPerScreen,
  currentSlideCarousel = [],
  totalItems = 12;
const mediaQuery1 = window.matchMedia("(max-width: 1000px)"),
  mediaQuery2 = window.matchMedia("(max-width: 500px)");
itemsPerScreen =
  mediaQuery1.matches && !mediaQuery2.matches ? 2 : mediaQuery2.matches ? 1 : 4;
for (let e = 0; e < prevBtn.length; e++) currentSlideCarousel.push(0);
for (let e = 0; e < prevBtn.length; e++)
  prevBtn[e].onclick = () => {
    const t = prevBtn[e].parentElement.nextElementSibling;
    currentSlideCarousel[e] == parseInt(totalItems / itemsPerScreen) - 1
      ? ((currentSlideCarousel[e] = 0),
        (t.style.transform = `translateX(${-100 * currentSlideCarousel[e]}%)`))
      : (currentSlideCarousel[e]++,
        (t.style.transform = `translateX(${-100 * currentSlideCarousel[e]}%)`));
  };
for (let e = 0; e < nextBtn.length; e++)
  nextBtn[e].onclick = () => {
    const t = nextBtn[e].parentElement.nextElementSibling;
    0 == currentSlideCarousel[e]
      ? ((currentSlideCarousel[e] = parseInt(totalItems / itemsPerScreen) - 1),
        (t.style.transform = `translateX(${-100 * currentSlideCarousel[e]}%)`))
      : (currentSlideCarousel[e]--,
        (t.style.transform = `translateX(${-100 * currentSlideCarousel[e]}%)`));
  };
//# sourceMappingURL=carousel.js.map
