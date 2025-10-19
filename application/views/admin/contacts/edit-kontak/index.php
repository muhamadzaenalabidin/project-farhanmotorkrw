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
		<div class="col-lg-6 col-12">

			<div class="card">
				<div class="card-body">
				<h6 class="card-title">Ubah Data Kontak</h6>
				<p class="card-text text-sm fw-light text-secondary mb-5">
					Anda akan melakukan perubahan data pada kontak <strong><?= $contact->nama_kontak; ?></strong>, pastikan data yang diubah sudah benar.
				</p>

				<form class="row g-3" method="post" action="<?= base_url('admin/ubah_contact/'.$contact->id_contact) ?>">
                    <div class="col-md-12">
                        <input type="hidden" name="id_kontak" value="<?= $contact->id_contact; ?>">
                    </div>

					<!-- Label Kontak -->
					<div class="col-md-12">
						<label for="kontak" class="form-label">Label Kontak</label>
						<input type="text" class="form-control" id="kontak" name="labelKontak" autocomplete="off" placeholder="Label kontak..." value="<?= $contact->nama_kontak; ?>">
						<div class="text-sm fw-light text-danger">
							<?= form_error('labelKontak') ?>
						</div>
					</div>

					<!-- Nomor Kontak -->
					<div class="col-md-12">
						<label for="nomor" class="form-label">Nomor Kontak *</label>
						<div class="input-group">
							<span class="input-group-text bg-light text-dark">+62</span>
							<input type="text" class="form-control" id="nomor" name="nomorKontak" autocomplete="off" placeholder="88887777666" value="<?= $contact->nomor_kontak; ?>">
						</div>
						<div class="text-sm fw-light text-danger">
							<?= form_error('nomorKontak') ?>
						</div>
						<small class="text-muted fst-italic">* Masukkan nomor tanpa awalan 0</small>
					</div>

					<!-- Switch tampilkan di landing -->
					<div class="col-md-12 mt-2">
						<div class="form-check form-switch">
							<input class="form-check-input" type="checkbox" role="switch" id="tampilLanding" name="tampilLanding" value="on" <?= ($contact->status == 'on') ? 'checked' : ''; ?>>
							<label class="form-check-label" for="tampilLanding">
								Tampilkan di halaman kontak landing page
							</label>
						</div>
					</div>

					<!-- Tombol -->
					<div class="text-start mt-5">
                        <button type="submit" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Perbarui
                        </button>
                        <a href="<?= base_url('admin/contacts') ?>" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left-circle"></i> Kembali
                        </a>
                    </div>
				</form><!-- End Form -->

				</div>
          	</div>
		</div>
	</div>
</section>

</main><!-- End #main -->

