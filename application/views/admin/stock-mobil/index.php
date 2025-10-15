<main id="main" class="main">

<div class="flash-data" 
     data-flash="<?= $this->session->flashdata('flash'); ?>"
     data-type="<?= $this->session->flashdata('flash_type'); ?>">
</div>


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

	<!-- Left side columns -->
	<div class="col-lg-12">
		<div class="row">

		<!-- Recent Sales -->
		<div class="col-12">
			<div class="card top-selling overflow-auto">

			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-12 col-md-10 col-lg-10 d-flex align-items-center">
						<h5 class="card-title mb-0">Stock Mobil</h5>
					</div>
					<div class="col-12 col-md-10 col-lg-10 d-flex align-items-center">
						<a href="<?= base_url('admin/tambah_product')?>" class="btn btn-primary btn-sm mb-5">
							<i class="fa-solid fa-plus fa-sm"></i> Unit
						</a>
					</div>
				</div>


				<table class="table table-borderless datatable">
				<thead>
					<tr>
					<th scope="col">Thumbnail</th>
					<th scope="col">Unit</th>
					<th scope="col">Merk</th>
					<th scope="col">Transmisi</th>
					<th scope="col">Tahun</th>
					<th scope="col">Harga</th>
					<th scope="col">Status</th>
					<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($products as $unit): ?>
					<tr>
					<th scope="row"><img src="storage/units/<?= $unit->thumbnail ?>" alt=""></th>
					<td>
						<a href="<?= base_url('admin/detailUnit/') . $unit->id_unit; ?>" class="text-primary fw-bold"><?= $unit->nama_unit ?></a>
					</td>
					<td class="fw-bold text-muted">
						<?= $unit->nama_merk ?>
					</td>
					<td class="fw-bold text-muted">
						<i class="fa-solid fa-gear"></i>
						<?= $unit->transmisi ?>
					</td>
					<td>
						<?= $unit->tahun ?>
					</td>
					<td class="text-success fw-bold">
						Rp <?= number_format($unit->harga, 0, ',', '.'); ?>	
					</td>
					<td>
						<span class="badge text-sm <?= ($unit->status == 'published') ? 'bg-success' : 'bg-danger' ?>">
							<?= $unit->status ?>
						</span>
					</td>
					<td>
						<!-- Dropdown Action Button -->
					<div class="dropdown">
						<button class="btn btn-warning btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-pencil-square"></i>
						</button>
						<ul class="dropdown-menu">
							<li>
							<a class="dropdown-item tombol-edit" href="<?= base_url('admin/edit_data_unit/') . $unit->id_unit; ?>">
								<i class="bi bi-pencil"></i>Data Unit
							</a>
							</li>
							<li>
							<a class="dropdown-item tombol-edit" href="<?= base_url('admin/edit_images/') . $unit->id_unit; ?>">
								<i class="bi bi-gear"></i>Gambar Unit
							</a>
							</li>
							<li><hr class="dropdown-divider"></li>
							<li>
							<a class="dropdown-item text-danger tombol-hapus" href="<?= base_url('admin/hapus_unit/') . $unit->id_unit; ?>">
								<i class="bi bi-trash"></i> Hapus
							</a>
							</li>
						</ul>
					</div>

					</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</table>

			</div>

			</div>
		</div>

		</div>
	</div><!-- End Left side columns -->

	</div>
</section>

</main><!-- End #main -->

