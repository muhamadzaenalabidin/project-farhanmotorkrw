<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Detail Produk</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="<?= base_url(); ?>">Home</a></li>
          <li class="current"><?= $produk['nama_unit']; ?></li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Product Details Section -->
  <section id="product-details" class="product-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-4">
        <div class="col-lg-1"></div>

        <!-- Product Gallery -->
        <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="150">
          <div class="product-gallery">
            <div class="main-showcase">
              <div class="image-zoom-wrapper">
                <div class="image-zoom-container">
                  <img 
                    src="<?= base_url('storage/units/'.$produk['thumbnail']); ?>"
                    alt="<?= $produk['nama_unit']; ?>"
                    class="img-fluid main-product-image drift-zoom"
                    id="main-product-image"
                    data-zoom="<?= base_url('storage/units/'.$produk['thumbnail']); ?>">

                  <div class="image-navigation">
                    <button class="nav-arrow prev-image image-nav-btn prev-image" type="button">
                      <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="nav-arrow next-image image-nav-btn next-image" type="button">
                      <i class="bi bi-chevron-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            <div class="thumbnail-grid">
              <?php foreach ($produk['semua_gambar'] as $g): ?>
                <div class="thumbnail-wrapper thumbnail-item <?= $g['nama_gambar'] == $produk['thumbnail'] ? 'active' : ''; ?>" 
                    data-image="<?= base_url('storage/units/'.$g['nama_gambar']); ?>">
                  <img src="<?= base_url('storage/units/'.$g['nama_gambar']); ?>" class="img-fluid" alt="Thumbnail">
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
          <div class="product-details">
            <h6 class="judul-detail-product"><?= strtoupper($produk['nama_merk']).' '.$produk['nama_unit']; ?></h6>

            <div class="pricing-section">
              <div class="price-display">
                <span class="harga-jual text-success">
                  Rp. <?= number_format($produk['harga'], 0, ',', '.'); ?>
                </span>
              </div>
            </div>

            <div class="benefits-list text-sm">
              <ul class="list-unstyled product-specs">
                <li><span class="spec-label">Merk</span> <span class="spec-value">: <?= $produk['nama_merk']; ?></span></li>
                <li><span class="spec-label">Transmisi</span> <span class="spec-value">: <?= $produk['transmisi']; ?></span></li>
                <li><span class="spec-label">Tahun</span> <span class="spec-value">: <?= $produk['tahun']; ?></span></li>
                <li><span class="spec-label">Warna</span> <span class="spec-value">: <?= $produk['warna']; ?></span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Deskripsi -->
      <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                Description
              </button>
            </li>
          </ul>

          <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
              <div class="content-section p-3">
                <div class="row g-4">
                  <div class="col-lg-8">
                    <div class="text-muted deskripsi-produk">
                      <?= nl2br($produk['deskripsi']); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Related Products -->
        <?php if (!empty($related)): ?>
        <div class="row g-4">
          <div class="col-lg-1"></div>
          <!-- Product Gallery -->
          

          <!-- Product Details -->
          <div class="col mt-5" data-aos="fade-left" data-aos-delay="200">
            <div class="product-details">
              <h6 class="">Related Products</h6>
              <!-- base on merk -->
                
              <div class="row">

                <!-- rekomendasi card -->
                <?php foreach ($related as $r): ?>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct/'.$r['id_unit']); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('storage/units/'.$r['thumbnail']); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm"><?= strtoupper($r['nama_merk']); ?></span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          <?= $r['nama_unit']; ?>
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp <?= number_format($r['harga'], 0, ',', '.'); ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
    </div>
  </section>
</main>
