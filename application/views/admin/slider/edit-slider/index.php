<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Farhan Motor Karawang</li>
                <li class="breadcrumb-item active">Edit Slider / Banner</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Edit banner / slider</h6>
                        <p class="card-text text-sm fw-light text-secondary mb-4">
                            Silakan ubah data slider/banner di bawah ini. Jika tidak ingin mengganti gambar, biarkan kolom upload kosong.
                        </p>

                        <!-- Form Edit Slider -->
                        <form class="row g-3" method="post" enctype="multipart/form-data" action="<?= base_url('admin/edit_slider/' . $slider['id_slider']) ?>">

                            <!-- Judul -->
                            <div class="col-md-12">
                                <label class="form-label">Judul slider / banner</label>
                                <input type="text" class="form-control" name="judulslider" autocomplete="off"
                                    placeholder="Judul slider / banner..."
                                    value="<?= set_value('judulslider', $slider['judul']); ?>">
                                <div class="text-sm fw-light text-danger">
                                    <?= form_error('judulslider') ?>
                                </div>
                            </div>
                            <!-- End Judul -->

                            <!-- Deskripsi -->
                            <div class="col-md-12">
                                <label class="form-label">Deskripsi slider / banner <span class="text-sm fw-light text-secondary">(optional)</span></label>
                                <textarea class="form-control" name="deskripsislider" rows="3" placeholder="Deskripsi slider / banner..."><?= set_value('deskripsislider', $slider['deskripsi']); ?></textarea>
                                <div class="text-sm fw-light text-danger">
                                    <?= form_error('deskripsislider') ?>
                                </div>
                            </div>
                            <!-- End Deskripsi -->

                            <!-- Gambar Lama -->
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Gambar saat ini</label>
                                <?php if (!empty($slider['image'])): ?>
                                    <div class="mb-2 text-center">
                                        <img src="<?= base_url('storage/sliders/' . $slider['image']); ?>"
                                             alt="<?= $slider['judul']; ?>"
                                             style="max-width: 80%; height: auto; border-radius: 5px;">
                                    </div>
                                <?php else: ?>
                                    <p class="text-muted fst-italic">Belum ada gambar.</p>
                                <?php endif; ?>
                            </div>
                            <!-- End Gambar Lama -->

                            <!-- Upload Gambar Baru -->
                            <div class="col-md-12">
                                <label class="form-label">Ganti gambar </label>
                                <input class="form-control" type="file" name="gambar_slider" accept=".jpg, .jpeg, .png">
                                <div class="text-sm fw-light text-danger">
                                    <?= isset($error) ? $error : ''; ?>
                                </div>

                                <!-- Info aturan -->
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="alert alert-secondary p-2 mb-0 text-sm" role="alert" style="font-size: 0.85rem;">
                                            <strong class="fw-bold">📌 Perhatian:</strong><br>
                                            - Format gambar yang diperbolehkan: <strong>JPG, JPEG, PNG</strong><br>
                                            - Maksimal ukuran file: <strong>2 MB</strong><br>
                                            - Rekomendasi ukuran: <strong>1920 x 600 px</strong><br>
                                            - Jika tidak ingin ganti gambar, biarkan kosong.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Upload Gambar Baru -->

                            <!-- Tombol Aksi -->
                            <div class="text-start mt-3">
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Update
                                </button>
                                <a href="<?= base_url('admin/slider') ?>" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left-circle"></i> Kembali
                                </a>
                            </div>
                            <!-- End Tombol Aksi -->

                        </form>
                        <!-- End Form -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->
