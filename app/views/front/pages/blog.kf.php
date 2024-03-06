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

                <div class="col-lg-8 entries">
                    <?php if ($posts) : foreach ($posts as $postRow) : ?>
                            <article class="entry">
                                ?>
                                <div class="entry-img">
                                    <img src="<?= get_image($postRow->image) ?>" style="width:100%;min-height:600px;object-fit:cover;" class="img-fluid">
                                </div>

                                <h2 class="entry-title">
                                    <a href="<?= ROOT ?>/home/singleblog/<?= $postRow->post_id ?>"><?= $postRow->title ?></a>
                                </h2>

                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $postRow->author ?></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= $postRow->date_posted ?></time></a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-server"></i> <a href="blog-single.html"> from: <?= $postRow->cat_name ?></a></li>
                                        <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                                    </ul>
                                </div>

                                <div class="entry-content">
                                    <p>
                                        <?= $postRow->content ?>
                                    </p>
                                    <div class="read-more">
                                        <a href="<?= ROOT ?>/home/singleblog/<?= $postRow->post_id . '/' . $postRow->title   ?>">Read More...</a>
                                    </div>
                                </div>

                            </article><!-- End blog entry -->
                        <?php endforeach; ?>
                        <!-- Pagination Start -->
                        <div class="blog-pagination">
                            <ul class="justify-content-center">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                            </ul>
                        </div>
                        <!-- Pagination End -->
                    <?php else : ?>
                        <div class="alert alert-primary text-center">
                            Oops, it seems that there are no Posts to display. <br> If you have permission to do so, kindly add some posts via the '<span class="kf-primary"><strong><u><a href="<?= ROOT ?>/admin">Admin Panel</a></u></strong></span>'!!
                        </div>
                    <?php endif; ?>


                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form method="GET">
                                <input type="text" name="search" value="<?= old_value('search') ?>" id="sidebar-search">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">

                            <ul>
                                <?php if ($categories) : foreach ($categories as $catRow) : ?>
                                        <li><a id="cat-list" href="#"><?= $catRow->cat_name ?></a></li>
                                <?php endforeach;
                                endif; ?>
                            </ul>

                        </div><!-- End sidebar categories-->

                        <h3 class="sidebar-title">Recent Posts</h3>
                        <div class="sidebar-item recent-posts">
                            <?php if ($recentPosts) : foreach ($recentPosts as $recPostsRow) : ?>
                                    <div class="post-item clearfix">
                                        <img src="<?= get_image($recPostsRow->image) ?>" alt="Blog Post Image">
                                        <h4><a href="<?= ROOT ?>/home/singleblog/<?= $recPostsRow->id ?>"><?= $recPostsRow->title ?></a></h4>
                                        <time datetime="2020-01-01"><?= $recPostsRow->date_posted ?></time>
                                    </div>
                                    <hr>
                            <?php endforeach;
                            endif; ?>
                        </div><!-- End sidebar recent posts-->

                    </div><!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->

<?php $this->view('front/inc/front-footer', $data) ?>