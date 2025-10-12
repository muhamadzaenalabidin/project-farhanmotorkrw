<main id="main" class="main">
  <div class="pagetitle">
    <h1>Upload Gambar Unit</h1>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-10 col-12">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Gambar Unit</h6>
            <p class="card-text text-sm fw-light text-secondary mb-5">
              Upload gambar untuk unit <strong><?= $units->nama_unit; ?></strong>.
            </p>

            <form action="<?= site_url('admin/uploadImage') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_unit" value="<?= $units->id_unit; ?>">

              <div class="mb-3">
                <input id="file-1" name="files[]" type="file" multiple>
              </div>

              <button type="submit" class="btn btn-primary mt-3">Upload</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>