Dropzone.autoDiscover = false;

var uploadedFiles = [];

var myDropzone = new Dropzone("#dropzoneArea", {
    url: "<?= base_url('admin/upload-foto-produk') ?>",
    paramName: "file",
    maxFilesize: 2, // MB
    acceptedFiles: "image/*",
    addRemoveLinks: true,
    dictDefaultMessage: "Seret & lepas gambar di sini atau klik untuk upload",
    init: function() {
        this.on("success", function(file, response) {
            let res = JSON.parse(response);
            if(res.status === 'success'){
                uploadedFiles.push(res.file);
                updateHiddenInputs();
            }
        });

        this.on("removedfile", function(file) {
            let index = uploadedFiles.indexOf(file.upload.filename);
            if (index !== -1) {
                uploadedFiles.splice(index, 1);
                updateHiddenInputs();
            }
        });
    }
});

function updateHiddenInputs(){
    let container = document.getElementById('uploadedFiles');
    container.innerHTML = '';
    uploadedFiles.forEach(function(filename){
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'foto_terupload[]';
        input.value = filename;
        container.appendChild(input);
    });
}