const accordionContent = document.querySelectorAll(".accordion-content");
document.onclick = (t) => {
  t.target.classList.contains("accordion")
    ? t.target.nextElementSibling.classList.toggle("active")
    : t.target.parentElement.classList.contains("accordion") &&
      t.target.parentElement.nextElementSibling.classList.toggle("active");
};
//# sourceMappingURL=accordion.js.map
