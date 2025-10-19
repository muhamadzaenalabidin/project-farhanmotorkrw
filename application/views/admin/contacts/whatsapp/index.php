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
				<h6 class="card-title">Kontak WhatsApp Showroom</h6>
				<p class="card-text text-sm fw-light text-secondary mb-5">
					Silahkan pilih kontak showroom sebagai whatsapp aktif.
				</p>



				<form class="row g-3" method="post" action="">

					<!-- Label Kontak -->
					<div class="col-md-12">
						<label for="whatsapp" class="form-label">Daftar kontak</label>
						<select class="form-select mb-3" name="whatsapp">
						<option disabled >Pilih nomor...</option>
                        <?php foreach($daftarkontak as $k) : ?>
						<option value="<?= $k['id_contact'] ?>">
                            <?= $k['nama_kontak'] ?> | +62<?= $k['nomor_kontak'] ?>
                        </option>
                        <?php endforeach; ?>
						</select>
						
                        <span class="fw-light text-sm text-secondary">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        silahkan pilih kontak untuk dijadikan whatsapp aktif pada halaman landing
                        </span>

                        <div class="text-sm fw-light text-danger">
						<?= form_error('merk') ?>
						</div>
					</div>

					<!-- Tombol -->
					<div class="text-start mt-5">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah
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

