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
              <h5 class="card-title mb-0 fw-semibold">Slider / Banner Landing Page</h5>
              <small class="text-muted d-block">
                Kelola daftar slider / banner pada halaman landing page
              </small>
            </div>
            <a href="<?= base_url('admin/tambah_slider')?>" class="btn btn-primary btn-sm">
              <i class="fa-solid fa-plus me-1"></i> Tambah Slider
            </a>
          </div>
          <!-- End Card Header -->

          <!-- Card Body -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle datatable">
                <thead class="table-light">
                  <tr>
                    <th scope="col" style="width: 5%;">No</th>
                    <th scope="col" class="text-center" style="width: 30%;">Slider / Banner</th>
                    <th scope="col" style="width: 20%;">Judul</th>
                    <th scope="col" style="width: 35%;">Keterangan</th>
                    <th scope="col" style="width: 10%;" class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($sliders as $slider): ?>
                  <tr>
                    <!-- Nomor -->
                    <td class="fw-bold"><?= $no++; ?></td>

                    <!-- Gambar -->
                    <td class="text-center">
                      <img 
                        src="<?= base_url('storage/sliders/'.$slider['image']); ?>" 
                        alt="<?= $slider['judul']; ?>"
                        class="img-thumbnail shadow-sm rounded"
                        style="width: 100%; max-width: 300px; height: auto; object-fit: cover;">
                    </td>

                    <!-- Judul -->
                    <td class="fw-semibold text-dark">
                      <?= $slider['judul']; ?>
                    </td>

                    <!-- Deskripsi -->
                    <td class="text-muted">
                      <?= $slider['deskripsi'] ? $slider['deskripsi'] : '<em>Tidak ada deskripsi</em>'; ?>
                    </td>

                    <!-- Aksi -->
                    <td class="text-center">
                      <div class="btn-group btn-group-sm" role="group">
                        <a href="<?= base_url('admin/edit_slider/'.$slider['id_slider']); ?>" 
                           class="btn btn-warning tombol-edit" 
                           title="Edit Slider" data-bs-toggle="tooltip">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <a href="<?= base_url('admin/hapus_slider/'.$slider['id_slider']); ?>" 
                           class="btn btn-danger tombol-hapus" 
                           title="Hapus Slider" data-bs-toggle="tooltip">
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
          <!-- End Card Body -->

        </div>
      </div>
    </div>
  </section>

</main>
