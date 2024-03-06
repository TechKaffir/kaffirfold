<?php $this->view('front/inc/front-header', $data) ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="<?= ROOT ?>">Home</a></li>
                <li>Blog</li>
            </ol>
            <hr>
            <h2><?= $page_title ?></h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">

                        <div>
                            <img src="<?= get_image($single_post->image, 'post') ?>" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a><?= $single_post->title ?></a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a><?= $single_post->author ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="2020-01-01"><?= $single_post->date_posted ?></time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a> from: <?= $single_post->cat_name ?></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a><?= $num_comments ?> Comment<?= $num_comments == 1 ? '' : 's' ?></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                <?= $single_post->content ?>
                            </p>
                        </div>


                    </article><!-- End blog entry -->

                    <div class="blog-comments" id="blog-comments">

                        <h4 class="comments-count"><?= '' ?> Comment</h4>
                        <?php if ($comments) : foreach ($comments as $row) : ?>
                                <div id="comment-1" class="comment">
                                    <div class="d-flex">
                                        <div class="comment-img"><img src="assets/img/blog/comments-1.jpg" alt=""></div>
                                        <div>
                                            <h5><a href=""><?= $row->fullname ?></a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                                            <time datetime="2020-01-01"><?= $row->com_date ?>
                                                <p>
                                                    <?= $row->comment ?>
                                                </p>
                                        </div>
                                    </div>
                                </div><!-- End comment #1 -->
                        <?php endforeach;
                        endif; ?>
                        <div class="reply-form">
                            <h4>Leave your comment</h4>
                            <p>Your email address will not be published. Required fields are marked * </p>

                            <form method="POST" action="">
                            <input type="hidden" name="session_id" value="<?= session_id() ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                          
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input name="<?= esc('fullname') ?>" type="text" value="<?= old_value('fullname') ?>" class="form-control" placeholder="Your Full Name*">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input name="<?= esc('email') ?>" type="text" value="<?= old_value('email') ?>" class="form-control" placeholder="Your Email*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col form-group">
                                        <label for="comment">Your Comment</label>
                                        <textarea name="<?= esc('comment') ?>" class="form-control" id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Captcha Image-->
                                    
                                </div>
                                <button type="submit" class="btn btn-success">Post Comment</button>

                            </form>
                        </div>
                    </div>
                    <!-- End blog comments -->
                </div><!-- End blog entries list -->
            </div>
        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php $this->view('front/inc/front-footer', $data) ?>