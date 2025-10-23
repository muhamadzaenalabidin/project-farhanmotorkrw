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

          <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <div>
              <h5 class="card-title mb-0 fw-semibold">Daftar Kontak Merk Unit</h5>
              <small class="text-muted d-block">Kelola daftar kontak showroom</small>
            </div>
            <a href="<?= base_url('admin/tambah_contact'); ?>" class="btn btn-primary btn-sm">
              <i class="fa-solid fa-plus me-1"></i> Tambah Kontak
            </a>
          </div>


          <div class="card-body">
            <!-- Info Whatsapp Aktif -->
            <div class="alert alert-light border d-flex align-items-center justify-content-between mb-4 mt-3">
              <?php if ($whatsapp): ?>
              <div class="">
                <span class="badge bg-success me-2 mb-2">
                  <i class="fa-brands fa-whatsapp me-1"></i>
                  <?= htmlspecialchars($whatsapp->nama_kontak) ?> - <?= htmlspecialchars($whatsapp->nomor_kontak) ?>
                </span>
                <span class="text-muted mb-2">
                  <i class="fa-solid fa-arrow-right me-1"></i>
                  Nomor aktif untuk WhatsApp float pada landing page website.
                </span>
              </div>
            <?php else: ?>
              <div>
                <span class="text-muted">
                  <i class="fa-solid fa-triangle-exclamation"></i>
                  Anda belum memilih nomor untuk floating whatsapp pada halaman landing page. klik <i class="fa-solid fa-gear"></i> untuk mengaturnya
                </span>
              </div>
            <?php endif; ?>

              <a href="<?= base_url('admin/whatsapp'); ?>" class="text-decoration-none text-dark" title="Ubah Nomor">
                <i class="fa-solid fa-gear fs-5"></i>
              </a>
            </div>

            <!-- Tabel Data -->
            <div class="table-responsive">
              <table class="table table-striped table-hover align-middle datatable">
                <thead class="table-light">
                  <tr>
                    <th scope="col" style="width: 5%;">No</th>
                    <th scope="col" style="width: 20%;">Dibuat</th>
                    <th scope="col" style="width: 20%;">Label</th>
                    <th scope="col" style="width: 25%;">Kontak</th>
                    <th scope="col" style="width: 15%;">Tampil</th>
                    <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach ($contacts as $index => $contact): ?>
                  <tr>
                    <td><?= $index + 1; ?></td>
                    <td class="text-muted small"><?= $contact['create_at']; ?></td>
                    <td class="fw-semibold"><?= $contact['nama_kontak']; ?></td>
                    <td class="fw-semibold">+62<?= $contact['nomor_kontak']; ?></td>
                    <td>
                      <span class="badge bg-<?= ($contact['status'] == 'on') ? 'success' : 'danger'; ?> rounded-pill">
						<?= ($contact['status'] == 'on') ? 'Aktif' : 'Tidak Aktif'; ?>
                      </span>
                    </td>
                    <td class="text-center">
                      <div class="btn-group btn-group-sm" role="group">
                        <a href="<?= base_url('admin/ubah_contact/'.$contact['id_contact']); ?>" class="btn btn-warning tombol-edit" title="Edit Kontak" data-bs-toggle="tooltip">
                          <i class="bi bi-pencil"></i>
                        </a>
                        <a href="<?= base_url('admin/hapus_contact/'.$contact['id_contact']); ?>" class="btn btn-danger tombol-hapus" title="Hapus Kontak" data-bs-toggle="tooltip">
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
      <!-- End Left side columns -->
    </div>
  </section>
</main>
