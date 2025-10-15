const flashData = $('.flash-data').data('flash');
const flashType = $('.flash-data').data('type') || 'success';

if (flashData) {
    Swal.fire({
        width: 400,
        title: flashType === 'success' ? 'Sukses' : 'Perhatian',
        text: flashData,
        icon: flashType
    });
}

$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        width: 400,
        title: "Hapus Data",
        text: "Apakah anda yakin ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    });

});


// alert
$('.tombol-edit').on('click', function(e) {
    e.preventDefault();
    const link = $(this).attr('href');

    Swal.fire({
        width: 400,
        title: "Edit Data",
        text: "Apakah anda yakin ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, edit!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.value) {
            document.location.href = link;
        }
    });

});

$('.tombol-konfirm').on('click', function(e) {
    e.preventDefault();
    const link = $(this).attr('href');

    Swal.fire({
        width: 400,
        title: "Simpan Data",
        text: "Apakah anda yakin ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Simpan!",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.value) {
            document.location.href = link;
        }
    });

});


// quill
var quill = new Quill('#editor-container', { theme: 'snow' });

// Ambil isi lama dari PHP (set_value)
var oldValue = document.getElementById('deskripsi').value;
if (oldValue) {
  quill.root.innerHTML = oldValue;
}

// Saat form disubmit
document.getElementById('formProduk').addEventListener('submit', function() {
  document.getElementById('deskripsi').value = quill.root.innerHTML;
});


// detail unit
$(document).ready(function () {
    const $mainImage = $('#mainImage');
    const $thumbs = $('.thumb-image');

    $thumbs.on('click', function () {
      const newSrc = $(this).attr('src');

      $mainImage.css('opacity', 0);
      setTimeout(() => {
        $mainImage.attr('src', newSrc).css('opacity', 1);
      }, 200);

      $thumbs.css('border', 'none');
      $(this).css('border', '3px solid #0d6efd');
    });
  });

