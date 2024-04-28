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
        <div class="container bg-<?= THEME_COLOR ?>" data-aos="fade-up">
            <div class="row">
                <h4 class="text-center text-light mt-2">BUILD AWESONE APPS & WEBSITES</h4>
                <p class="px-5 text-light" style="text-align: justify;">
                    An awesome Framework to initiate PHP Projects in PHP OOP MVC. <br> <br>

                    Are you tired of constantly reinventing the wheel when it comes to your PHP app development? You may try my custom OOP MVC Framework. With a user-friendly interface and intuitive design patterns, Kaffir Fold Framework takes you from the absolute beginning of your project to about 70% completion in no time. Our framework is not only easy to use but also highly customizable to fit the needs of your unique project. Get started with Kaffir Fold Framework today and watch your App Development process become faster and more efficient than ever before.
                </p>
            </div>
            <!--SPEAK PIPE EMBED: KaffirFold uses the speakpipe platform for the 'Contact Us' task. You will need to signin or signup @ https://www.speakpipe.com for free, to generate your own embed links!!  -->
            <div class="row">
                <div class="col-lg-12 p-5">
                    <iframe src="https://www.speakpipe.com/widget/inline/v79zrxpfk4zvgdaap1zd98nee0omm9jn" allow="microphone" width="100%" height="200" frameborder="0"></iframe>
                    <script async src="https://www.speakpipe.com/widget/loader.js" charset="utf-8"></script>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->
</main><!-- End #main -->

<?php $this->view('front/inc/front-footer', $data) ?>