const searchInput = document.querySelector(
    ".main-content-sidebar-search-input"
  ),
  searchItems = document.querySelectorAll(
    ".browse-products-card-container-inner-card-content-heading"
  );
searchInput.addEventListener("input", (e) => {
  searchItems.forEach((e) => {
    e.textContent.includes(searchInput.value.toUpperCase)
      ? (e.parentElement.style.display = "flex")
      : (e.parentElement.style.display = "none");
  });
});
