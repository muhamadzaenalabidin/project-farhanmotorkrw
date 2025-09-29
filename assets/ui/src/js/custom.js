// logout alert
const button = document.getElementById('logout_notif');

button.addEventListener('click', e =>{
    e.preventDefault();

    Swal.fire({
        text: "Apakah Anda yakin ingin keluar?",
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "Keluar",
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
    });
});