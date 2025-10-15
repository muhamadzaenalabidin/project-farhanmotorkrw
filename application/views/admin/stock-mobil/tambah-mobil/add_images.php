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
            <div class="circle"><i class="fa-solid fa-dot-circle"></i></div>
            <div class="label">Gambar Unit</div>
          </div>
          <div class="line"></div>
          <div class="step">
            <div class="circle"><i class="fa-solid fa-check"></i></div>
            <div class="label">Thumbnail Unit</div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Gambar Unit</h6>
            <p class="card-text text-sm fw-light text-secondary mb-5">
              Upload detail gambar untuk unit <strong class="fw-bold"><?= $units->nama_unit; ?></strong> dibawah.
            </p>

            

            <?php if ($this->session->flashdata('error')): ?>
              <?= $this->session->flashdata('error'); ?>
            <?php endif; ?>

            <form action="<?= site_url('admin/uploadImage') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id_unit" value="<?= $units->id_unit; ?>">

              <div class="mb-3">
                <input id="file-1" name="files[]" type="file" multiple>
              </div>

              <button type="submit" class="btn btn-sm btn-primary mt-3">Upload</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</main>