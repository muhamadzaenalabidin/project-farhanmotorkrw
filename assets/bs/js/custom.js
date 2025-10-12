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


// hilangkan garis header


  // Fungsi untuk sembunyikan garis pas layar mengecil
function handleDividerDisplay() {
  const divider = document.getElementById('header-divider');
  if (window.innerWidth < 1200) {
    divider.style.display = 'none';
  } else {
    divider.style.display = 'block';
  }
}

// Jalankan saat halaman load
window.addEventListener('load', handleDividerDisplay);
// Jalankan setiap kali ukuran layar berubah
window.addEventListener('resize', handleDividerDisplay);