$('.tombol-hapus').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        width: 400,
        title: "Hapus Unit",
        text: "Apakah anda yakin ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
            });
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


