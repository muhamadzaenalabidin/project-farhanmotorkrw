document.addEventListener("DOMContentLoaded", function () {
  function toggleStickyTop() {
    const headerSuper = document.querySelector(".super-top-bar");
    if (!headerSuper) return;

    if (window.innerWidth < 1200) {
      headerSuper.classList.add("superior-nav");
    } else {
      headerSuper.classList.remove("superior-nav");
    }
  }

  // jalan pertama kali
  toggleStickyTop();

  // jalan pas resize
  window.addEventListener("resize", toggleStickyTop);
});


// floating button whatapp
const waButton = document.getElementById("wa-button");
const waBox = document.getElementById("wa-box");
const waIcon = waButton.querySelector("i");

waButton.addEventListener("click", () => {
  waBox.classList.toggle("d-none");
  waButton.classList.toggle("active");

  if (waButton.classList.contains("active")) {
    waIcon.classList.remove("bi-whatsapp");
    waIcon.classList.add("bi-x");
  } else {
    waIcon.classList.remove("bi-x");
    waIcon.classList.add("bi-whatsapp");
  }
});