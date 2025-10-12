$("#file-1").fileinput({
    theme: "fa5",
    language: "id",
    allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    showUpload: false,       // ✅ biar pakai tombol submit
    showRemove: true,
    maxFileSize: 2048,
    maxFileCount: 5,
    browseOnZoneClick: true,
    fileActionSettings: {
      showRemove: true,
      removeClass: "btn btn-sm btn-danger",
      removeIcon: "<i class='fa fa-trash'></i>"
    },
    msgPlaceholder: "Pilih gambar..."
  });