<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Farhan Motor Karawang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="<?= base_url('assets/images/logos/' . $profiles['logo']) ?>" 
                    alt="Profile" 
                    class="img-fluid" 
                    style="max-width: 250px; height: auto;">
            </div>
          </div>


        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detail Profile</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Showroom</div>
                    <div class="col-lg-9 col-md-8">
                        <?= $profiles['nama_showroom']; ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat Shoowrom</div>
                    <div class="col-lg-9 col-md-8">
                        <?= $profiles['alamat']; ?>
                    </div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="formProfile" action="<?= base_url('admin/update_profile') ?>" method="post" enctype="multipart/form-data">

                    <div class="row mb-3">
                      <label for="logoshowroom" class="col-md-4 col-lg-3 col-form-label">Logo Showroom</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?= base_url('assets/images/logos/' . $profiles['logo']) ?>" alt="Profile">
                        <div class="pt-2">
                            <input type="file" name="logo_showroom" id="logo_showroom" class="form-control">
                        </div>
                      </div>
                    </div>

                    <!-- Nama Showroom -->
                    <div class="row mb-3">
                    <label for="showroomname" class="col-md-4 col-lg-3 col-form-label">Nama Showroom</label>
                    <div class="col-md-8 col-lg-9">
                        <input name="nama_showroom" type="text" class="form-control" id="showroomname" 
                            value="<?= $profiles['nama_showroom']; ?>">
                    </div>
                    </div>

                    <!-- Alamat -->
                    <div class="row mb-3">
                    <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                        <textarea name="alamat" class="form-control" id="alamat" style="height: 100px"><?= $profiles['alamat']; ?></textarea>
                    </div>
                    </div>

                    <!-- Tombol Save -->
                    <div class="text-center">
                         <button type="submit" class="btn btn-primary tombol-form-konfirm">
                            <i class="bi bi-save me-1"></i> Save Changes
                        </button>
                    </div>

                </form><!-- End Profile Edit Form -->

                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->