<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav class="mt-2">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Farhan Motor Karawang</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12 col-12">

        <div class="card">
          <div class="card-body">
            <!-- Gambar Saat Ini -->
            <div class="card mb-4 mt-4">
              <div class="card-body pb-1">
                <h5 class="card-title mb-3">Gambar Saat Ini</h5>
                <div class="row g-3">
                    <p class="text-sm text-muted font-italic">Gambar untuk unit <strong><?= $units->nama_unit; ?></strong></p>
                  <?php if (!empty($images)): ?>
                    <?php foreach ($images as $img): ?>
                      <div class="col-md-4 col-4">
                        <img src="<?= base_url('storage/units/' . $img->nama_gambar); ?>"
                             class="img-thumbnail mb-5"
                             alt="Gambar Unit">
                      </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <p class="text-muted fst-italic">Belum ada gambar untuk unit ini.</p>
                  <?php endif; ?>
                </div>
                <div class="row g-3">
                    <p class="text-sm text-muted font-italic">Thumbnail aktif</p>
                    <?php if(!$thumbnail) :?>
                        <div class="col-md-4 col-4">
                            <span class="text-muted fst-italic">Belum ada thumbnail yang dipilih.<a href="<?= base_url('admin/updateThumbnail/'.$units->id_unit) ?>" class="btn btn-sm btn-primary mt-2 mb-3">Set Thumbnail</a>
                        </span>
                            
                        </div>
                    <?php else :?>
                    <div class="col-md-4 col-4">
                        <img src="<?= base_url('storage/units/' . $thumbnail->nama_gambar); ?>"
                             class="img-thumbnail mb-5"
                             alt="Gambar Unit">
                    </div>
                    <?php endif; ?>
                </div>
              </div>
            </div>

            <!-- Notifikasi Error -->
            <?php if ($this->session->flashdata('error')): ?>
                <?= $this->session->flashdata('error'); ?>
            <?php endif; ?>

            <!-- Form Upload -->
            <form action="<?= site_url('admin/updateImage') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_unit" value="<?= $units->id_unit; ?>">

              <div class="mb-3">
                <label for="file-1" class="form-label fw-semibold">Silahkan upload gambar baru disini</label>
                <input id="file-1" name="files[]" type="file" multiple class="form-control">
                <small class="text-muted">* Bisa pilih lebih dari satu file (jpg, jpeg, png)</small>
              </div>

              <button type="submit" class="btn btn-sm btn-primary mt-2">Perbarui</button>
              <a href="<?= base_url('admin/products')?>" class="btn btn-sm btn-secondary mt-2">Kembali</a>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>
</main>
