const cancel = document.querySelectorAll(
  ".profile-main-content-orders-order-card-rent-now-link"
);
cancel.forEach((e) => {
  e.onclick = () => {
    (e.parentElement.parentElement.style.opacity = "0"),
      console.log(e.parentElement.parentElement);
  };
});