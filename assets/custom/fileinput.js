$("#file-1").fileinput({
    theme: "fa5",
    language: "id",
    allowedFileExtensions: ['jpg', 'jpeg', 'png'],
    showUpload: false,      
    showRemove: true,
    maxFileSize: 2048,
    maxFileCount: 25,
    browseOnZoneClick: true,
    fileActionSettings: {
      showRemove: true,
      removeClass: "btn btn-sm btn-danger",
      removeIcon: "<i class='fa fa-trash'></i>"
    },
    msgPlaceholder: "Pilih gambar..."
  });