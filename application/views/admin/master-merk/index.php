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
		<div class="col-8">
			<div class="card top-selling overflow-auto">

			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-12 col-md-10 col-lg-10 d-flex align-items-center">
						<h5 class="card-title mb-0">Master Merk Unit</h5>  
					</div>
					<div class="col-12 col-md-10 col-lg-10 d-flex align-items-center">
						<h6 class="card-subtitle mb-2 text-muted">Kelola daftar merk unit yang dimiliki showroom</h6> 
					</div>
					<div class="col-12 col-md-10 col-lg-10 d-flex align-items-center mt-3">
						<a href="admin/tambah_merk" class="btn btn-primary btn-sm mb-5">
							<i class="fa-solid fa-plus fa-sm text-sm"></i> Merk
						</a>
					</div>
				</div>


				<table class="table table-borderless datatable">
				<thead>
					<tr>
					<th scope="col">No</th>
					<th scope="col">Dibuat</th>
					<th scope="col">Merk</th>
					<th scope="col text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($merks as $merk): ?>
					<tr>
					<th scope="row">
                        <?= $i++; ?>
                    </th>
					<td class="fw-bold text-muted">
						<?= $merk['create_at']; ?>
					</td>
					<td class="fw-bold text-muted"><?= $merk['nama_merk']; ?>
                    </td>
					<td class="text-center">
					 <div class="btn-group btn-group-sm" role="group">
                        <a href="<?= base_url('admin/edit_merk/'.$merk['id_merk']); ?>" class="btn btn-warning tombol-edit">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="<?= base_url('admin/hapus_merk/'.$merk['id_merk']); ?>" class="btn btn-danger tombol-hapus">
                            <i class="bi bi-trash"></i>
                        </a>
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

