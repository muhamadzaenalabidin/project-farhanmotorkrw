<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Detail Produk</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= base_url(); ?>">Home</a></li>
            <li class="current">Detail Produk</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

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
                    <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-5.jpeg"
                        alt="Product Main"
                        class="img-fluid main-product-image drift-zoom"
                        id="main-product-image"
                        data-zoom="<?= base_url('assets/images/detail-products/'); ?>detail-product-5.jpeg">

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
                <div class="thumbnail-wrapper thumbnail-item active" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-5.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-5.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-1.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-1.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-2.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-2.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-3.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-3.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-4.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-4.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-6.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-6.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-7.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-7.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-8.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-8.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-9.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-9.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-10.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-10.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-11.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-11.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-12.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-12.jpeg" alt="View 1" class="img-fluid">
                </div>
                <div class="thumbnail-wrapper thumbnail-item" data-image="<?= base_url('assets/images/detail-products/'); ?>detail-product-13.jpeg">
                  <img src="<?= base_url('assets/images/detail-products/'); ?>detail-product-13.jpeg" alt="View 1" class="img-fluid">
                </div>
              </div>
            </div>
          </div>

          <!-- Product Details -->
          <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
            <div class="product-details">
              <h6 class="judul-detail-product">HYUNDAI SANTA FE NEW MODEL 1.6 HYBRID 2025</h6>

              <div class="pricing-section">
                <div class="price-display">
                  <span class="harga-jual text-success">Rp. 20.000.000</span>
                </div>
              </div>

              <!-- Benefits List -->
              <div class="benefits-list text-sm">
                <ul class="list-unstyled product-specs">
                  <li>
                    <span class="spec-label">Merk</span>
                    <span class="spec-value">: Hyundai</span>
                  </li>
                  <li>
                    <span class="spec-label">Transmisi</span>
                    <span class="spec-value">: Manual</span>
                  </li>
                  <li>
                    <span class="spec-label">Tahun</span>
                    <span class="spec-value">: 2022</span>
                  </li>
                  <li>
                    <span class="spec-label">Warna</span>
                    <span class="spec-value">: Hitam</span>
                  </li>
                </ul>
              </div>

            </div>
          </div>
        </div>
        

        <div class="col-lg-1"></div>

        <!-- deskripsi -->
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
                      <h3>Unit Description</h3>
                      <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam vero labore aut blanditiis nulla et ratione neque, odit molestias dolor nemo, at repellat ullam corrupti eligendi velit doloribus laborum quis tempore similique sunt obcaecati distinctio magni? Odit ab quaerat ipsum tenetur aliquid aperiam expedita soluta amet quas adipisci veniam dolorem, impedit animi ex iure explicabo consectetur recusandae quidem deleniti rerum iste? Quibusdam inventore nostrum harum dolorum esse repellendus excepturi nam laudantium magnam, unde exercitationem itaque ex odio asperiores ipsam dolore fugiat, commodi sit eligendi similique recusandae! Corrupti ullam, labore voluptates enim voluptas maxime quasi explicabo modi dicta facere nisi vero magni sint pariatur autem. Eos quod nam autem numquam labore impedit accusamus eius libero totam optio ullam suscipit harum corporis assumenda, reprehenderit voluptate a provident? Ea officia nisi tempore.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-1"></div>
        </div>

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
                
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3 mb-3">
                  <a href="<?= base_url('landing/detailproduct'); ?>" class="text-decoration-none text-reset">
                    <div class="card h-100 border-0 shadow-sm">
                      <img src="<?= base_url('assets/images/cars/product-1.jpeg'); ?>" 
                          class="card-img-top" alt="Mitsubishi Xpander">
                      <div class="card-body text-start">
                        <div class="mb-1 text-secondary text-uppercase small fw-semibold mb-2">
                          <i class="bi bi-car-front me-1"></i> 
                          <span class="text-sm">MITSUBISHI</span>
                        </div>
                        <p class="mb-2 text-dark fw-light">
                          MITSUBISHI XPANDER CROSS 2023
                        </p>
                        <p class="fw-bold mb-0 text-center text-success mt-3">
                          Rp 340.000.000
                        </p>
                      </div>
                    </div>
                  </a>
                </div>


              </div>
              

            </div>
          </div>
        </div>
      </div>
    </section><!-- /Product Details Section -->

    

</main>