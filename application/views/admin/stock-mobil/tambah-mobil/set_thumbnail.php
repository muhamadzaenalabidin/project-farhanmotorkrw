<main id="main" class="main">

<div class="pagetitle">
	<h1>Dashboard</h1>
	<nav class="mt-2">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Farhan Motor Karawang</i>
	</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-10 col-12">
        <div class="progress-tracker align-items-center mb-4">
          <div class="step active">
            <div class="circle"><i class="fa-solid fa-check"></i></div>
            <div class="label">Data Unit</div>
          </div>
          <div class="line active"></div>
          <div class="step active">
            <div class="circle"><i class="fa-solid fa-check"></i></div>
            <div class="label">Gambar Unit</div>
          </div>
          <div class="line active"></div>
          <div class="step active">
            <div class="circle"><i class="fa-solid fa-dot-circle"></i></div>
            <div class="label">Thumbnail Unit</div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Pilih Thumbnail</h6>
            <p class="card-text text-sm fw-light text-secondary mb-4">
              Pilih salah satu gambar untuk dijadikan thumbnail unit <strong><?= $units->nama_unit; ?></strong>.
            </p>

            <form action="<?= base_url('admin/set_thumbnail'); ?>" method="post">
              <input type="hidden" name="id_unit" value="<?= $units->id_unit; ?>">

              <div class="row">
                <?php foreach ($gambars as $g) : ?>
                  <div class="col-md-3 col-6 mb-4 text-center">
                    <img src="<?= base_url('storage/units/' . $g->nama_gambar); ?>" 
                         alt="gambar unit" 
                         class="img-fluid rounded mb-2" 
                         style="height: 150px; object-fit: cover;">

                    <div class="form-check d-flex justify-content-center">
                      <input class="form-check-input" 
                             type="radio" 
                             name="thumbnail" 
                             id="thumb_<?= $g->id_gambar; ?>" 
                             value="<?= $g->id_gambar; ?>" 
                             <?= ($g->thumbnail == 'set') ? 'checked' : ''; ?>>
                      <label class="form-check-label ms-1" for="thumb_<?= $g->id_gambar; ?>">
                        Pilih
                      </label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="bi bi-save"></i> Simpan</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
