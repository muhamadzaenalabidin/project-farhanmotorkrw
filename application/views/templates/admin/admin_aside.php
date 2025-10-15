<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar bg-fm">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link bg-fm-sub <?= $page == 'dashboard' ? 'bg-fm-aktif' : '' ?>" href="admin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-heading text-muted">Data Webisite</li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub" href="#">
          <i class="bi bi-files-alt"></i>
          <span>Profile Showroom</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub" href="#">
          <i class="bi bi-card-image"></i>
          <span>Banner</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub" href="#">
          <i class="bi bi-whatsapp"></i>
          <span>Kontak Marketing</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub" href="#">
          <i class="bi bi-person-badge"></i>
          <span>Sosial Media</span>
        </a>
      </li><!-- End Register Page Nav -->
	
	  <li class="nav-heading text-muted">Data Product</li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub <?= $page == 'merk' ? 'bg-fm-aktif' : '' ?>" href="<?= base_url('admin/merk') ?>">
          <i class="bi bi-list-nested"></i>
          <span>Merk Mobil</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub <?= $page == 'stocks' ? 'bg-fm-aktif' : '' ?>" href="admin/products">
          <i class="bi bi-list-task"></i>
          <span>Stok Mobil</span>
        </a>
      </li>

	  <li class="nav-heading text-muted">Pengaturan Lain</li>

      <li class="nav-item">
        <a class="nav-link collapsed bg-fm-sub" href="#">
          <i class="bi bi-people-fill"></i>
          <span>Pengguna</span>
        </a>
      </li>

    </ul>

  </aside>