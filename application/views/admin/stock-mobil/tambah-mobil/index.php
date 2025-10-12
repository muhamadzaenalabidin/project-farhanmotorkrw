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
				<div class="step <?= $progress == 'data_unit' ? 'active' : ''; ?>">
					<div class="circle"><i class="fa-solid fa-check"></i></div>
					<div class="label">Data Unit</div>
				</div>
				<div class="line"></div>
				<div class="step <?= $progress == 'gambar_unit' ? 'active' : ''; ?>">
					<div class="circle"><i class="fa-solid fa-check"></i></div>
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
				<h6 class="card-title">Data Unit</h6>
				<p class="card-text text-sm fw-light text-secondary mb-5">Silahkan isi data unit dan pastikan semua data terisi dengan benar.</p>

				<!-- Multi Columns Form -->
				<!-- <form class="row g-3" id="formProduk" enctype="multipart/form-data" method="post"> -->
					<form class="row g-3" id="formProduk" method="post" action="<?= base_url('admin/tambah_product') ?>">
					
					<!-- nama unit -->
					<div class="col-md-12">
					<label for="inputName5" class="form-label">Nama Unit *</label>
					<input type="text" class="form-control" id="inputName5" name="namaUnit" autocomplete="off" placeholder="Nama Unit..." value="<?= set_value('namaUnit'); ?>">
					<div class="text-sm fw-light text-danger">
                      <?= form_error('namaUnit') ?>
                    </div>
					</div>
					<!-- end nama unit -->

					<!-- merk -->
					<div class="col-md-6">
					<label for="inputEmail5" class="form-label">Merk *</label>
					<div class="col-sm-12">
						<select class="form-select" name="merk">
						<option disabled <?= set_value('merk') == '' ? 'selected' : ''; ?>>Pilih merk unit...</option>
						<?php foreach ($merk as $m): ?>
							<option value="<?= $m['id_merk']; ?>" <?= set_value('merk') == $m['id_merk'] ? 'selected' : ''; ?>>
							<?= $m['nama_merk']; ?>
							</option>
						<?php endforeach; ?>
						</select>
						<div class="text-sm fw-light text-danger">
						<?= form_error('merk') ?>
						</div>
					</div>
					</div>
					<!-- end merk -->
					
					<!-- warna unit -->
					<div class="col-md-6">
					<label class="form-label">Warna *</label>
					<input type="text" class="form-control" name="warna" placeholder="Warna Unit..." autocomplete="off" value="<?= set_value('warna'); ?>">
					<div class="text-sm fw-light text-danger">
                      <?= form_error('warna') ?>
                    </div>
					</div>
					<!-- end warna unit -->
					
					<!-- tahun -->
					<div class="col-md-6">
					<label for="inputEmail5" class="form-label">Tahun *</label>
					<select class="form-select" name="tahun" required>
						<option disabled <?= set_value('tahun') == '' ? 'selected' : ''; ?>>Pilih Tahun..</option>
						<?php foreach ($years as $year): ?>
						<option value="<?= $year; ?>" <?= set_value('tahun') == $year ? 'selected' : ''; ?>>
							<?= $year; ?>
						</option>
						<?php endforeach; ?>
					</select>
					<div class="text-sm fw-light text-danger">
						<?= form_error('tahun') ?>
					</div>
					</div>
					<!-- end tahun -->

					
					<!-- transmisi -->
					<div class="col-md-6">
					<label class="form-label">Transmisi *</label>
					<div class="col-sm-10">
						<div class="form-check">
						<input 
							class="form-check-input" 
							type="radio" 
							name="transmisi" 
							value="manual" 
							<?= set_value('transmisi', 'manual') == 'manual' ? 'checked' : ''; ?>>
						<label class="form-check-label">Manual</label>
						</div>
						<div class="form-check">
						<input 
							class="form-check-input" 
							type="radio" 
							name="transmisi" 
							value="automatic" 
							<?= set_value('transmisi') == 'automatic' ? 'checked' : ''; ?>>
						<label class="form-check-label">Automatic</label>
						</div>
						<div class="text-sm fw-light text-danger">
						<?= form_error('transmisi') ?>
						</div>
					</div>
					</div>
					<!-- end transmisi -->

					<!-- harga unit -->
					<div class="col-12">
					<label for="inputAddress5" class="form-label">Harga Unit *</label>
					<div class="input-group">
                      <span class="input-group-text" id="basic-addon1">Rp.</span>
                      <input type="number" class="form-control" placeholder="Harga Mobil Tanpa Titik" name="harga" value="<?= set_value('harga'); ?>">
                    </div>
					<div class="text-sm fw-light text-danger">
						<?= form_error('harga') ?>
					</div>
					</div>
					<!-- end harga unit -->
					
					<div class="col-12">
					<label class="form-label">Deskripsi</label>
					<div id="editor-container" style="height: 150px; border: 1px solid gray; border-radius: 3px;">
						<?= htmlspecialchars_decode(set_value('deskripsi')); ?>
					</div>

					<textarea id="deskripsi" name="deskripsi" class="form-control mt-2" rows="3" hidden></textarea>
					</div>


					<div class="text-star mt-3">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-secondary">Batal</button>
					</div>
				</form><!-- End Multi Columns Form -->

				</div>
          	</div>
		</div>
	</div>
</section>

</main><!-- End #main -->

