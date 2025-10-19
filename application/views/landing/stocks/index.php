
<main class="main mb-5">

<!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Stok Mobil</h1>
      <nav class="breadcrumbs">
        <ol>
          <li>Stok Mobil</li>
          <li class="current">Honda</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- End Page Title -->

    <!-- Procuks cars  -->
    <section id="best-sellers" class="best-sellers section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">


        <?php if($stocksbymerk): ?>

        <div class="row g-5">
          <!-- text -->
          <div class="col-lg-12">
            <div class="section-header text-center text-lg-start">
              <p class="text-secondary">Berikut stock untuk merk : <span class="badge bg-danger text-light"> <?= $merk['nama_merk'] ?> <a href="<?= base_url(); ?>">
                <i class="bi bi-x-circle text-light"></i>
              </a> </span></p>
            </div>
          </div>
          <!-- end text -->


          <?php foreach($stocksbymerk as $stock) : ?>

          <!-- Product 1 -->
          <div class="col-6 col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <a href="<?= base_url('landing/detailproduct/'.$stock['id_unit']); ?>">
                  <img src="<?= base_url('storage/units'); ?>/<?= $stock['thumbnail'] ?>" alt="Product Image" class="img-fluid" loading="lazy">
                </a>
              </div>
              <div class="product-info">
                <div class="product-category">
                  <i class="bi bi-car-front"></i> <?= $stock['nama_merk']; ?>
                </div>
                <h4 class="product-name"><a href="<?= base_url('landing/detailproduct/'.$stock['id_unit']); ?>"><?= $stock['nama_unit']; ?></a></h4>
                <div class="product-price text-center">
                  <span class="current-price text-success fw-bold">Rp <?= number_format($stock['harga'], 0, ',', '.'); ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- End Product 1 -->

          <?php endforeach; ?>
        </div>

        <?php else: ?>
          <div class="row">
            <div class="col-12">
              <div class="alert alert-warning text-center" role="alert">
                Maaf, stok untuk merk ini sedang tidak tersedia.
              </div>
            </div>
          </div>
        <?php endif; ?>

      </div>

    </section>
</main>

  