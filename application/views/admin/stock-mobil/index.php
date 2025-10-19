<main id="main" class="main">

  <!-- Flash Message -->
  <div class="flash-data" 
      data-flash="<?= $this->session->flashdata('flash'); ?>"
      data-type="<?= $this->session->flashdata('flash_type'); ?>">
  </div>

  <!-- Page Title -->
  <div class="pagetitle mb-3">
    <h1 class="fw-semibold mb-1">Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Farhan Motor Karawang</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow-sm border-0">

          <!-- Card Header -->
          <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <div>
              <h5 class="card-title mb-0 fw-semibold">Stock Unit</h5>
              <small class="text-muted d-block">Kelola daftar unit siap jual yang dimiliki showroom</small>
            </div>
            <a href="<?= base_url('admin/tambah_product')?>" class="btn btn-primary btn-sm">
              <i class="fa-solid fa-plus me-1"></i> Tambah Unit
            </a>
          </div>
          <!-- End Card Header -->

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle datatable">
                <thead class="table-light">
                  <tr>
                    <th scope="col" style="width: 10%;">Thumbnail</th>
                    <th scope="col" style="width: 20%;">Unit</th>
                    <th scope="col" style="width: 15%;">Merk</th>
                    <th scope="col" style="width: 15%;">Transmisi</th>
                    <th scope="col" style="width: 10%;">Tahun</th>
                    <th scope="col" style="width: 15%;">Harga</th>
                    <th scope="col" style="width: 10%;">Status</th>
                    <th scope="col" style="width: 5%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($products as $unit): ?>
                    <tr>
                      <!-- Thumbnail -->
                      <td>
                        <img src="<?= base_url('storage/units/'.$unit->thumbnail); ?>" 
                             alt="<?= $unit->nama_unit ?>" 
                             class="img-thumbnail rounded shadow-sm" 
                             style="width: 80px; height: 60px; object-fit: cover;">
                      </td>

                      <!-- Nama Unit -->
                      <td>
                        <a href="<?= base_url('admin/detailUnit/') . $unit->id_unit; ?>" 
                           class="text-primary fw-semibold text-decoration-none">
                          <?= $unit->nama_unit ?>
                        </a>
                      </td>

                      <!-- Merk -->
                      <td class="fw-semibold text-muted">
                        <?= $unit->nama_merk ?>
                      </td>

                      <!-- Transmisi -->
                      <td class="fw-semibold text-muted">
                        <i class="fa-solid fa-gear me-1"></i><?= $unit->transmisi ?>
                      </td>

                      <!-- Tahun -->
                      <td class="text-muted">
                        <?= $unit->tahun ?>
                      </td>

                      <!-- Harga -->
                      <td class="fw-bold text-success">
                        Rp <?= number_format($unit->harga, 0, ',', '.'); ?>
                      </td>

                      <!-- Status -->
                      <td>
                        <span class="badge text-capitalize <?= ($unit->status == 'published') ? 'bg-success' : 'bg-danger' ?>">
                          <?= $unit->status ?>
                        </span>
                      </td>

                      <!-- Aksi -->
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-warning btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" title="Aksi">
                            <i class="bi bi-pencil-square"></i>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                              <a class="dropdown-item tombol-edit" href="<?= base_url('admin/edit_data_unit/') . $unit->id_unit; ?>">
                                <i class="bi bi-pencil me-2"></i> Data Unit
                              </a>
                            </li>
                            <li>
                              <a class="dropdown-item tombol-edit" href="<?= base_url('admin/edit_images/') . $unit->id_unit; ?>">
                                <i class="bi bi-images me-2"></i> Gambar Unit
                              </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                              <a class="dropdown-item text-danger tombol-hapus" href="<?= base_url('admin/hapus_unit/') . $unit->id_unit; ?>">
                                <i class="bi bi-trash me-2"></i> Hapus
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
    </div>
  </section>

</main>
