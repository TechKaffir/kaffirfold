  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT ?>">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT . '/home/blog'?>">Blog/Centre News</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT . '#'?>">Careers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT . '#'?>">Partners</a></li>
            


          </div>

          <div class="col-lg-3 col-md-6 footer-links <?= FR_FOOTER_TEXT ?>">
            <h4>LEGAL</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT . '/home/popia' ?>"><?= 'POPIA Compliance' ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="#" target="_blank"><?= 'Documentation' ?></a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="<?= ROOT . '/home/privacy' ?>">Privacy policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a class="<?= FR_FOOTER_TEXT ?>" href="#">Terms of service</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact <?= FR_FOOTER_TEXT ?>">
            <h4>Contact Us</h4>
            <p>
              <?= $comp_detail->address ?? '11 Some Street, Somewhere, Somecity' ?> <br><br>
              <strong>Phone:</strong><a class="text-light" href="tel:<?= $comp_detail->phone ?? '+27123456789' ?>">&nbsp;<?= $comp_detail->phone ?? '27 12 345 6789' ?></a><br>
              <strong>Email:</strong> <a class="text-light" href="mailto:<?= $comp_detail->email ?? 'salesoffice@jongibrandz.co.za' ?>">&nbsp;<?= $comp_detail->email ?? 'salesoffice@jongibrandz.co.za' ?></a><br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h4><?= strtoupper('About ' . APP_NAME_SHORT)  ?></h4>
            <p class="<?= FR_FOOTER_TEXT ?>"><?= !empty($comp_detail->about) ? substr($comp_detail->about, 0, 200) : 'An awesome Framework to initiate PHP Projects in PHP OOP MVC.' ?>
              <a class="readmore" href="<?= ROOT ?>/#about">
                read more...
              </a>
            </p>
            <div class="social-links mt-3">
              <a href="<?= $social_link->twitter_link ?? '#' ?>" target="_blank" class="<?= BG ?> <?= FR_FOOTER_TEXT ?> twitter"><i class="bx bxl-twitter"></i></a>
              <a href="<?= $social_link->facebook_link ?? '#' ?>" target="_blank" class="<?= BG ?> <?= FR_FOOTER_TEXT ?> facebook"><i class="bx bxl-facebook"></i></a>
              <a href="<?= $social_link->tiktok_link ?? '#' ?>" target="_blank" class="<?= BG ?> <?= FR_FOOTER_TEXT ?> tiktok"><i class="bx bxl-tiktok"></i></a>
              <a href="<?= $social_link->linkedin ?? '#' ?>" target="_blank" class="<?= BG ?> <?= FR_FOOTER_TEXT ?> linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?= APP_NAME ?></span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Powered by <a class="text-<?= THEME_COLOR ?>" href="https://techsolutions.jongibrandz.co.za/" target="_blank">Jongi Brands Tech Solutions</a> <hr> <small><em>Credit to <a class="text-<?= THEME_COLOR ?>" href="https://bootstrapmade.com/" target="_blank">Bootstrapmade</a> for primary UI Template then secondary KaffirFold UI, backend & frontend!! </em></small>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= ROOT ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?= ROOT ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Front JS File -->
  <script src="<?= ROOT ?>/assets/js/front.js"></script>

  <!-- Jongi Brands Custom JS File -->
  <script src="<?= ROOT ?>/assets/js/jb-custom.js"></script>

  <!-- Google Translate Scripts -->
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <!-- End Google Translate Scripts -->
  </body>
</html>