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
      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="card shadow-sm border-0">

          <!-- Header Card -->
          <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <div>
              <h5 class="card-title mb-0 fw-semibold">Master Merk Unit</h5>
              <small class="text-muted d-block">Kelola daftar merk unit yang dimiliki showroom</small>
            </div>
            <a href="<?= base_url('admin/tambah_merk'); ?>" class="btn btn-primary btn-sm">
              <i class="fa-solid fa-plus me-1"></i> Tambah Merk
            </a>
          </div>

          <!-- Body Card -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle datatable">
                <thead class="table-light">
                  <tr>
                    <th scope="col" style="width: 5%;">No</th>
                    <th scope="col" style="width: 25%;">Dibuat</th>
                    <th scope="col" style="width: 50%;">Merk</th>
                    <th scope="col" class="text-center" style="width: 20%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($merks as $merk): ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td class="text-muted small"><?= $merk['create_at']; ?></td>
                      <td class="fw-semibold"><?= $merk['nama_merk']; ?></td>
                      <td class="text-center">
                        <div class="btn-group btn-group-sm" role="group">
                          <a href="<?= base_url('admin/edit_merk/'.$merk['id_merk']); ?>" 
                             class="btn btn-warning tombol-edit" 
                             title="Edit Merk" data-bs-toggle="tooltip">
                            <i class="bi bi-pencil"></i>
                          </a>
                          <a href="<?= base_url('admin/hapus_merk/'.$merk['id_merk']); ?>" 
                             class="btn btn-danger tombol-hapus" 
                             title="Hapus Merk" data-bs-toggle="tooltip">
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
          <!-- End Body Card -->

        </div>
      </div>
      <!-- End Left side columns -->
    </div>
  </section>

</main>
