<main id="main" class="main">

  <!-- Flash Message -->
  <div class="flash-data" 
      data-flash="<?= $this->session->flashdata('flash'); ?>"
      data-type="<?= $this->session->flashdata('flash_type'); ?>">
  </div>

  <!-- Page Title -->
  <div class="pagetitle mb-3">
    <h1 class="fw-semibold mb-1">Sosial Media</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Kelola daftar sosial media showroom</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-12">

        <div class="card shadow-sm border-0">
          <div class="card-header d-flex justify-content-between align-items-center bg-light">
            <div>
              <h5 class="card-title mb-0 fw-semibold">Tambah Sosial Media</h5>
              <small class="text-muted d-block">Pilih platform, isi username dan link akun</small>
            </div>
          </div>

          <div class="card-body">

            <!-- ALERT -->
            <?php if($this->session->flashdata('flash')): ?>
            <div class="alert alert-<?= $this->session->flashdata('flash_type') ?? 'warning' ?> alert-dismissible fade show mt-3" role="alert">
                <strong><?= $this->session->flashdata('flash_type') == 'success' ? 'Berhasil!' : 'Perhatian!' ?></strong><br>
                <?= $this->session->flashdata('flash'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php endif; ?>


            <form action="<?= base_url('admin/sosmed') ?>" method="post" class="row gy-2 gx-3 align-items-center mb-4 mt-4">

            <!-- Platform -->
            <div class="col-lg-3 col-md-6"> 
                <select name="platform" class="form-select">
                <option value="">-- Pilih Platform --</option>
                <?php foreach($platform as $pf) :?>
                    <option value="<?= $pf['id_platform'] ?>" <?= set_select('platform', $pf['id_platform']) ?>>
                    <?= $pf['name'] ?>
                    </option>
                <?php endforeach; ?>
                </select>
            </div>

            <!-- Username -->
            <div class="col-lg-3 col-md-6 position-relative">
                <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="text" name="username" class="form-control" placeholder="username" value="<?= set_value('username') ?>" autocomplete="off">
                </div>
            </div>

            <!-- URL -->
            <div class="col-lg-4 col-md-6">
                <input type="url" name="url" class="form-control" placeholder="https://..." value="<?= set_value('url') ?>" autocomplete="off">
            </div>

            <!-- Tombol -->
            <div class="col-lg-2 col-md-6 text-end">
                <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>

            </form>



            <!-- Dummy Tabel Data -->
            <div class="table-responsive mt-5">
            <table class="table table-striped table-hover align-middle datatable">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Platform</th>
                    <th>Icon</th>
                    <th>Username</th>
                    <th>URL</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach($medsos as $s): ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $s['name'] ?></td>
                    <td><i class="<?= $s['icon'] ?> fs-4"></i></td>
                    <td><?= $s['username'] ?></td>
                    <td>
                    <a href="<?= $s['url'] ?>" target="_blank" class="text-primary text-decoration-none">
                        <?= $s['url'] ?>
                    </a>
                    </td>
                    <td class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-warning dropdown-toggle" type="button" id="aksiDropdown<?= $i ?>" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-pencil-square"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="aksiDropdown<?= $i ?>">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('admin/sosmed/edit/'.$s['id_sosmed']) ?>">
                            <i class="bi bi-pencil me-2"></i>Edit
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item text-danger tombol-hapus" href="<?= base_url('admin/sosmed/delete/'.$s['id_sosmed']) ?>">
                            <i class="bi bi-trash me-2"></i>Hapus
                            </a>
                        </li>
                        </ul>
                    </div>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>
                </tbody>
            </table>
            </div>


          </div>
        </div>

      </div>
    </div>
  </section>

</main>
