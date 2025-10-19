<nav class="navation">
  <div class="header-nav">
    <div class="container-fluid container-xl position-relative">
      <nav id="navmenu" class="navmenu">
        <ul class="gap-4">
          <li>
            <a href="<?= base_url(); ?>" class="<?= ($active_menu == 'home' ? 'on-page' : '') ?>">Home</a>
          </li>
          <li>
            <a href="<?= base_url('landing/about'); ?>" class="<?= ($active_menu == 'about' ? 'on-page' : '') ?>">Tentang Kami</a>
          </li>
          <li class="dropdown"><a href="#" class="<?= ($active_menu == 'stok' ? 'on-page' : '') ?>"><span>Stok Mobil</span> 
            <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <?php foreach($merks as $merk): ?>
                <li><a href="<?= base_url('landing/stocks/' . $merk['id_merk']); ?>"><?= $merk['nama_merk']; ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <li><a href="<?= base_url('landing/terms');?>" class="<?= ($active_menu == 'terms' ? 'on-page' : '') ?>">Syarat Ketentuan</a></li>
          <li><a href="<?= base_url('landing/contact');?>" class="<?= ($active_menu == 'contact' ? 'on-page' : '') ?>">Kontak</a></li>
        </ul>
      </nav>
    </div>
  </div>
</nav>