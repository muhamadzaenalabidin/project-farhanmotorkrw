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

	<!-- Left side columns -->
	<div class="col-lg-12">
		<div class="row">

			<!-- Welcome Card -->
			<div class="col-12 mb-4">
				<div class="alert alert-secondary d-flex align-items-center" role="alert">
					<i class="bi bi-house-door-fill me-2 fs-4"></i>
					<div>
						<h4 class="fw-bold mb-0">Welcome to the Admin Dashboard</h4>
						<small class="text-muted">Kelola semua data showroom dari satu tempat.</small>
					</div>
				</div>
			</div>

			<!-- Info Card Example -->
			<div class="col-md-4">
				<div class="card info-card">
					<div class="card-body">
						<h5 class="card-title">Total Merk</h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-primary text-white me-3" style="width:50px; height:50px;">
								<i class="bi bi-tags"></i>
							</div>
							<div>
								<h6><?= $totalmerk; ?></h6>
								<span class="text-muted small">Merk terdaftar</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card info-card">
					<div class="card-body">
						<h5 class="card-title">Total Unit</h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-success text-white me-3" style="width:50px; height:50px;">
								<i class="fa-solid fa-car"></i>
							</div>
							<div>
								<h6><?= $totalunits; ?></h6>
								<span class="text-muted small">Unit tersedia</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card info-card">
					<div class="card-body">
						<h5 class="card-title">Slider Aktif</h5>
						<div class="d-flex align-items-center">
							<div class="card-icon rounded-circle d-flex align-items-center justify-content-center bg-warning text-white me-3" style="width:50px; height:50px;">
								<i class="bi bi-images"></i>
							</div>
							<div>
								<h6><?= $totalsliders; ?></h6>
								<span class="text-muted small">Banner aktif</span>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- End Left side columns -->

	</div>
</section>

</main><!-- End #main -->
