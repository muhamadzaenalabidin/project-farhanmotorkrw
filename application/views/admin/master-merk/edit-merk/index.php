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
		<div class="col-lg-6 col-12">

			<div class="card">
				<div class="card-body">
				<h6 class="card-title">Ubah Data Merk Unit</h6>
				<p class="card-text text-sm fw-light text-secondary mb-5">Silahkan isi data merk unit dan pastikan data terisi dengan benar.</p>

					<form class="row g-3" id="formProduk" method="post" action="<?= base_url('admin/edit_merk/'.$merk['id_merk']) ?>">
					
					<!-- nama unit -->
					<div class="col-md-12">
					<label for="inputName5" class="form-label">Nama Merk Unit*</label>
					<input type="text" class="form-control" id="inputName5" name="namaMerk" autocomplete="off" placeholder="Nama Merk Unit..." value="<?= set_value('namaMerk', $merk['nama_merk']); ?>">
					<div class="text-sm fw-light text-danger">
                      <?= form_error('namaMerk') ?>
                    </div>
					</div>


					<div class="text-star mt-4">
						<button type="submit" class="btn btn-warning btn-sm">
							<i class="bi bi-pencil-square"></i>
							Perbarui
						</button>
						<a href="<?= base_url('admin/merk') ?>" class="btn btn-secondary btn-sm">
							<i class="bi bi-arrow-left-circle"></i>
							Kembali
						</a>
					</div>
				</form><!-- End Multi Columns Form -->

				</div>
          	</div>
		</div>
	</div>
</section>

</main><!-- End #main -->

