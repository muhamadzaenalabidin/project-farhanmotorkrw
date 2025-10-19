<footer id="footer" class="footer bg-fhmotor text-light pt-5">

  <!-- Baris Atas -->
  <div class="container">
    <div class="row gy-4">
      
      <!-- Logo + Keterangan + Alamat -->
      <div class="col-lg-6 col-md-12 text-center text-lg-start">
        <a href="#" class="d-flex justify-content-center justify-content-lg-start mb-5">
          <img src="<?= base_url('assets/images/logos/fm-motor.png'); ?>" alt="Logo" class="logo-footer me-2">
        </a>
        <span class="small">
          WEBSITE RESMI
        </span>
        <span class="h6 d-block mt-4">
          <strong>
            <?= strtoupper($profiles['nama_showroom'])?>
          </strong> <br> <span class="fw-light mt-3">Jual-Beli Mobil Bekas Berkualitas</span>
        </span>
        <div class="footer-address mt-3">
          <p class="mb-2"><i class="bi bi-geo-alt me-2"></i>
            <?= $profiles['alamat'] ?>
          </p>
          <p class="mb-2"><i class="bi bi-telephone me-2"></i>
          <?php 
          $lastIndex = count($numberactive) - 1;
          foreach($numberactive as $index => $number) : ?>
            +62<?= $number['nomor_kontak'] ?><?= $index < $lastIndex ? ' / ' : '' ?>
          <?php endforeach; ?>

          </p>
          <p class="mb-2"><i class="bi bi-instagram me-2"></i>@farhanmotor.id</p>
          <p class="mb-2"><i class="bi bi-clock me-2"></i>Kamis - Sabtu: 09.00 - 17.00</p>
        </div>
      </div>

      <!-- Map -->
      <div class="col-lg-6 col-md-12">
        <h5 class="text-white mb-3">Lokasi Kami</h5>
        <div class="ratio ratio-16x9">
          <<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.745159213059!2d107.2904527!3d-6.297181899999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d589eaa2d4b%3A0xb22422fc3c32c9bd!2sShowroom%20Farhan%20Motor!5e0!3m2!1sen!2sid!4v1758635961742!5m2!1sen!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

    </div>
  </div>

  <!-- Baris Bawah -->
  <div class="footer-bottom py-3 mt-4 border-top border-secondary">
    <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center">
      
      <!-- Copyright -->
      <div class="text-center text-md-start mb-2 mb-md-0">
        <small>&copy; Copyright <strong><span>Farhan Motor Karawang</span></strong>. All Rights Reserved</small>
      </div>

    </div>
  </div>

</footer>

<!-- whatapps -->

<?php if($whapsapp) : ?>
<a href="https://wa.me/62<?= $whapsapp->nomor_kontak ?>" target="_blank" id="wa-float">
  <i class="bi bi-whatsapp"></i>
</a>
<?php endif; ?>


<!-- whatapp -->



  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/bs')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/drift-zoom/Drift.min.js"></script>
  <script src="<?= base_url('assets/bs')?>/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="<?= base_url('assets/bs')?>/js/main.js"></script>
  <script src="<?= base_url('assets/bs')?>/js/custom.js"></script>

</body>

</html>