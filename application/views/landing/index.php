
<main class="main">
	<div class="section">
		<div class="container-fluid">
			<div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
				<div class="col-11">
					<div id="demo" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators/dots -->
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
              <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>
            
            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
              <?php foreach ($sliders as $index => $slider): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : ''; ?>">
                  <img src="<?= base_url('storage/sliders/' . $slider['image']); ?>" alt="<?= $slider['judul']; ?>" class="d-block" style="width:100%">
                </div>
              <?php endforeach; ?>
            </div>
            
            <!-- Left and right controls/icons -->
            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
				</div>
			</div>
		</div>
	</div>

	<!-- end Hero Section -->

    <!-- Best Sellers Section -->
    <section id="best-sellers" class="best-sellers section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Farhan Motor Karawang</h2>
        <p>Jual-Beli Mobil Bekas Berkualitas</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-5">
          <?php foreach($units as $unit): ?>
          <!-- Product 2 -->
          <div class="col-6 col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <a href="<?= base_url('landing/detailproduct/' . $unit['id_unit']) ?>">
                  <img src="<?= base_url('storage/units/' . $unit['thumbnail']); ?>" alt="Product Image" class="img-fluid" loading="lazy">
                </a>
              </div>
              <div class="product-info">
                <div class="product-category">
                  <i class="bi bi-car-front"></i> <?= $unit['nama_merk'] ?>
                </div>
                <h4 class="product-name"><a href="<?= base_url('landing/detailproduct/' . $unit['id_unit']) ?>"><?= $unit['nama_unit'] ?></a></h4>
                <div class="product-price text-center">
                  <span class="current-price text-success fw-bold">Rp. <?= number_format($unit['harga'], 0, ',', '.') ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Product 2 -->
          <?php endforeach; ?>
        </div>
      </div>
    </section>
</main>

  