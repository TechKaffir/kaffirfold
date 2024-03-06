<?php $this->view('front/inc/front-header', $data) ?>

<!-- ======= Hero Section ======= -->
<div class="container-fluid">
  <div class="row">
    <section id="hero" class="">
      <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
          <div class="carousel-inner" role="listbox">ab
            <div class="carousel-item active" style="background-image: url(assets/img/<?= HERO_SEC_IMG ?>)">
              <div class="carousel-container">
                <div class="carousel-content mt-5">
                  <div class="mt-4">
                    <h3 class="animate__animated animate__fadeInDown mt-4">You are now navigating: <br> <span class="text-<?= THEME_COLOR ?>"><?= APP_NAME ?></span> </h3>
                  </div>
                  <p class="animate__animated animate__fadeInUp shadow <?= FR_HERO_DESC_TEXT ?> p-2"><?= !empty($comp_detail->about) ? substr($comp_detail->about, 0, 200) : 'Designed, created and powered by Jongi Brands Tech Solutions, in Gqeberha, Eastern Cape, South Africa ' ?> <a class="readmore" href="#about" class="btn btn-<?= THEME_COLOR ?> btn-sm">
                      read more...
                    </a></p>
                  <div class="mb-5">
                    <a href="<?= HERO_CTA_LINK ?>" class="btn-get-started animate__animated animate__fadeInUp mb-3"><?= HERO_CTA ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero -->
  </div>
</div>

<main id="main">
  <!-- ======= Gallery Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="row portfolio-container">
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= ROOT ?>/assets/img/<?= GALLERY_IMG_1 ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Gallery Title 1</h4>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <img src="<?= ROOT ?>/assets/img/<?= GALLERY_IMG_2 ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Gallery Title 2</h4>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="<?= ROOT ?>/assets/img/<?= GALLERY_IMG_3 ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Gallery Title 3</h4>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
  </section><!-- End Gallery Section -->
</main><!-- End #main -->

<!-- ======= Footer ======= -->

<!-- Begin SpeakPipe code -->
<script type="text/javascript">
  (function(d) {
    var app = d.createElement('script');
    app.type = 'text/javascript';
    app.async = true;
    app.src = 'https://www.speakpipe.com/loader/rwsfn4glsopok8hjknrajsce6obqld27.js';
    var s = d.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(app, s);
  })(document);
</script>
<!-- End SpeakPipe code -->
<?php $this->view('front/inc/front-footer', $data) ?>