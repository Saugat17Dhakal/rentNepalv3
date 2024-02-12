const prevButton = document.querySelector(".main-section-prev"),
  nextButton = document.querySelector(".main-section-next"),
  sliders = document.querySelectorAll(".slider");
let currentSlide = 0;
(prevButton.onclick = () => {
  sliders.forEach((e) => e.classList.remove("active")),
    0 == currentSlide
      ? ((currentSlide = sliders.length - 1),
        sliders[currentSlide].classList.add("active"))
      : (currentSlide--, sliders[currentSlide].classList.add("active"));
}),
  (nextButton.onclick = () => {
    sliders.forEach((e) => e.classList.remove("active")),
      currentSlide == sliders.length - 1
        ? ((currentSlide = 0), sliders[currentSlide].classList.add("active"))
        : (currentSlide++, sliders[currentSlide].classList.add("active"));
  });
//# sourceMappingURL=slider.js.map
