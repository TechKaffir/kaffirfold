<?php $this->view('front/inc/front-header', $data) ?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= ROOT ?>">Home</a></li>
                <li><?= $page_title ?></li>
            </ol>
            <hr>
            <h2><?= $page_title ?><a class="btn btn-outline-<?= THEME_COLOR ?> float-end" href="<?= ROOT ?>"><i class="bi bi-arrow-left"></i> BACK HOME</a></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 bg-<?= THEME_COLOR ?> p-5" >
                    <iframe src="https://www.speakpipe.com/widget/inline/rwsfn4glsopok8hjknrajsce6obqld27" allow="microphone" width="100%" height="200" frameborder="0"></iframe>
                    <script async src="https://www.speakpipe.com/widget/loader.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?php $this->view('front/inc/front-footer', $data) ?>