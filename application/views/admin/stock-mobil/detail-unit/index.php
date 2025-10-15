<main id="main" class="main">

  <div class="pagetitle">
    <h1>Detail Unit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/units'); ?>">Data Unit</a></li>
        <li class="breadcrumb-item active">Detail Unit</li>
      </ol>
    </nav>
  </div>
  <div>
    <a href="<?= base_url('admin/products'); ?>" class="btn btn-sm btn-secondary mb-4">
      <i class="fa-solid fa-arrow-left fa-sm"></i> Kembali
    </a>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <!-- ================== Bagian Atas ================== -->
        <div class="row g-4 mb-4">
          <!-- Gambar -->
          <div class="col-lg-7">
            <!-- Gambar Utama -->
            <div class="mb-3">
              <img id="mainImage" 
                   src="<?= base_url('storage/units/' . $thumbnail->nama_gambar); ?>" 
                   alt="<?= $units->nama_unit; ?>"
                   class="img-fluid w-100 rounded shadow-sm"
                   style="height:400px; object-fit:cover; transition: .3s;">
            </div>
            <!-- Galeri Thumbnail -->
            <div class="d-flex flex-wrap gap-2">
              <?php foreach($gambar as $g): ?>
                <img src="<?= base_url('storage/units/' . $g->nama_gambar); ?>" 
                     alt="thumb"
                     class="thumb-image rounded shadow-sm"
                     style="height:90px; width:auto; cursor:pointer; object-fit:cover; transition: all .2s ease;">
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Informasi Unit -->
          <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-4">
              <h4 class="fw-bold"><?= strtoupper($units->nama_unit); ?></h4>
              <p class="fs-5 text-success fw-bold">Rp <?= number_format($units->harga, 0, ',', '.'); ?></p>

              <table class="table table-borderless mb-0">
                <tr>
                  <td style="width:120px;">Merk</td>
                  <td>: <?= $units->merk; ?></td>
                </tr>
                <tr>
                  <td>Transmisi</td>
                  <td>: <?= $units->transmisi; ?></td>
                </tr>
                <tr>
                  <td>Tahun</td>
                  <td>: <?= $units->tahun; ?></td>
                </tr>
                <tr>
                  <td>Warna</td>
                  <td>: <?= $units->warna; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <!-- ================== Deskripsi ================== -->
        <div class="card border-0 shadow-sm p-4">
          <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc" type="button" role="tab">Description</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
              <p class="text-secondary mb-0" style="white-space: pre-line;">
                <?= !empty($units->deskripsi) ? $units->deskripsi : 'Belum ada deskripsi untuk unit ini.'; ?>
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<!-- ================== Script ================== -->
