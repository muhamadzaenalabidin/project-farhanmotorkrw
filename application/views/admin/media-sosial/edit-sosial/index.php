<main id="main" class="main">

    <div class="pagetitle mb-3">
        <h1 class="fw-semibold mb-1">Dashboard</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Farhan Motor Karawang</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit data sosial media</h6>
                        <p class="card-text text-sm fw-light text-secondary mb-4">
                            Silahkan ubah data sosial media dibawah dan pastikan semua data diisi dengan benar
                        </p>

                        <!-- Form Edit Slider -->
                        <form class="row g-3" method="post" action="">

                            <!-- Platform -->
                            <div class="col-md-12">
                                <label class="form-label">Platform</label>
                                <select name="platform" class="form-select">
                                    <option value="" disabled>-- Pilih Platform --</option>
                                    <?php foreach($platform as $p): ?>
                                        <option value="<?= $p['id_platform']; ?>" 
                                            <?= ($p['id_platform'] == $medsos->id_platform) ? 'selected' : ''; ?>>
                                            <?= $p['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="text-sm fw-light text-danger">
                                    <?= form_error('platform'); ?>
                                </div>
                            </div>

                            <!-- Username -->
                            <div class="col-md-12">
                                <label class="form-label">Username 
                                </label>
                                <span class="text-sm fw-light text-secondary"><small>(gunakan '@' didepan username)</small></span>
                                <input type="text" name="username" class="form-control" placeholder="username" 
                                    value="<?= $medsos->username?>" autocomplete="off">
                                <div class="text-sm fw-light text-danger">
                                    <?= form_error('username'); ?>
                                </div>
                            </div>

                            <!-- URL -->
                            <div class="col-md-12">
                                <label class="form-label fw-bold">URL</label>
                                <input type="url" name="url" class="form-control" placeholder="https://..." 
                                    value="<?= $medsos->url?>" autocomplete="off">
                                <div class="text-sm fw-light text-danger">
                                    <?= form_error('url'); ?>
                                </div>
                            </div>

                            <!-- Tombol -->
                            <div class="text-start mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Perbarui
                                </button>
                                <a href="<?= base_url('admin/sosmed') ?>" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>

                        </form>

                        <!-- End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
