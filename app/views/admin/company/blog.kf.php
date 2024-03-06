<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main"> 

    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome',$data); ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($action == 'new') : ?>
                            <div class="row my-3">
                                <h4>ADD NEW BLOG POST</h4>
                            </div>
                           
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?> 
                                <!--Blog Image-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change image</h6>
                                            <img src="<?= get_image() ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="<?= esc('title') ?>" value="<?= old_value('title') ?>" class="form-control mb-1" id="title">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="content">Content</label>
                                        <textarea name="<?= esc('content') ?>" class="form-control mb-1" id="post_content" cols="30" rows="10"><?= old_value('content') ?></textarea>
                                        
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="author">Author</label>
                                        <!-- BlogPost Author - Current User -->
                                        <input type="text" name="<?= esc('author') ?>" class="form-control mb-1" value="<?= user('firstname') . ' ' . user('surname') ?>" id="author" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="category">Category</label>
                                        <select name="<?= esc('category') ?>" class="form-control mb-1" id="category">
                                            <option value="Select Category">--Select Category--</option>
                                            <?php if ($categories) :
                                                foreach ($categories as $catRow) : ?>
                                                    <option value="<?= $catRow->id ?>"><?= $catRow->cat_name ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">CREATE NEW POST</button>
                                        <?php // show($errors); die; ?>
                                        <a href="<?= ROOT ?>/admin/blog" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT POST</h4>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--Blog Image-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change image</h6>
                                            <img src="<?= old_value(get_image($row->image), get_image($row->image))  ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="title">Post Title</label>
                                        <input type="text" name="<?= esc('title') ?>" value="<?= old_value('title', $row->title) ?>" class="form-control mb-1" id="title">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="content">Content</label>
                                        <textarea name="<?= esc('content') ?>" class="form-control mb-1" id="post_content" cols="30" rows="10"><?= old_value('content', $row->content) ?></textarea>
                                    
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="author">Author</label>
                                        <!-- BlogPost Author - Current User -->
                                        <input type="text" name="<?= esc('author') ?>" class="form-control mb-1" value="<?= user('firstname') . ' ' . user('surname') ?>" id="author" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="category">Category</label>
                                        
                                        <select name="<?= esc('category') ?>" class="form-control mb-1" id="category">
                                            <option value="Select category">--Select category--</option>
                                            <?php if ($categories) :
                                            
                                                foreach ($categories as $catRow) : ?>
                                                <?php $selCatRow = old_value('category',$row->category) ?>
                                                    <option value="<?= $catRow->id ?>" <?= $selCatRow == $catRow->id ? 'selected' : '' ?>>
                                                        <?= $catRow->cat_name ?>
                                                    </option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE POST</button>
                                        <a href="<?= ROOT ?>/admin/blog" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE POST</h3>
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--Blog Image-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change image</h6>
                                            <img src="<?= get_image($row->image) ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="title">Post Title</label>
                                        <div class="form-control mb-1"><?= $row->title ?></div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="content">Content</label>
                                        <div class="form-control mb-1"><?= $row->content ?></div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="author">Author</label>
                                        <div class="form-control mb-1"><?= $row->author ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="category">Category</label>
                                        <div class="form-control mb-1"><?= $row->category ?></div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE POST</button>
                                        <a href="<?= ROOT ?>/admin/blog" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <?php if (user('user_role') == 'Admin' || user('user_role') == 'Manager') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/blog/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW POST</a>
                                </div>
                                <hr>
                            <?php endif; ?>
                            <?= Util::displayFlash('post_create_success', 'success') ?>
                            <?= Util::displayFlash('post_update_success', 'success') ?>
                            <?= Util::displayFlash('post_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                   
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Featured Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Date Posted</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($posts)) :
                                            foreach ($posts as $row) :
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $userRows++ ?></th>
                                                    <td><img src="<?= get_image($row->image) ?>" style="width:100px;height:100px; object-fit:cover"></td>
                                                    <td><?= $row->title ?></td>
                                                    <td><?= $row->content ?></td>
                                                    <td><?= $row->author ?></td>
                                                    <td><?= $row->cat_name ?></td>
                                                    <td><?= $row->date_posted ?></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/blog/edit/<?= $row->post_id ?>"><i class="bi bi-pencil-square m-2"></i></a>
                                                            <a href="<?= ROOT ?>/admin/blog/delete/<?= $row->post_id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>