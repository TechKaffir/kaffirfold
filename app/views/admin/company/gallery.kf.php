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
                                <h4>ADD NEW IMAGE</h4>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                 <!--CSRF TOKEN-->
                                 <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER CREATING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?> 
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change image</h6>
                                            <img src="<?= get_image() ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPLOAD NEW IMAGE</button>
                                        <a href="<?= ROOT ?>/admin/gallery" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT IMAGE (UPLOAD NEW)</h4>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change image</h6>
                                            <img src="<?= get_image($row->image) ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPLOAD NEW IMAGE</button>
                                        <a href="<?= ROOT ?>/admin/gallery" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE IMAGE</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                               <!--CSRF TOKEN-->
                               <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <img src="<?= get_image($row->image) ?>" style="width:300px; height:300px; object-fit:cover;cursor:pointer">
                                            <div onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none"></div>
                                        </label>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE IMAGE</button>
                                        <a href="<?= ROOT ?>/admin/gallery" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <?php if (user('user_role') == 'Admin' || user('user_role') == 'Manager') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/gallery/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW</a>
                                </div>
                                <hr>
                            <?php endif; ?>
                            <div class="row">
                                <h5>IMAGE GALLERY</h5>
                            </div>
                            <?= Util::displayFlash('image_upload_success', 'success') ?>
                            <?= Util::displayFlash('image_update_success', 'success') ?>
                            <?= Util::displayFlash('image_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($images)) :
                                            foreach ($images as $row) :
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $userRows++ ?></th>
                                                    <td><img src="<?= get_image($row->image) ?>" style="width:100px;height:100px; object-fit:cover"></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/gallery/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                            <a href="<?= ROOT ?>/admin/gallery/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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