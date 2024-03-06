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
                        <?php if ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">EDIT CONTACT INFO</h3>
                            </div>
                            <form method="POST" action="">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="twitter_link">Twitter Link</label>
                                        <input type="text" name="<?= esc('twitter_link') ?>" value="<?= old_value('twitter_link'), $row->twitter_link ?>" class="form-control mb-1" id="twitter_link">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="facebook_link">Facebook Link</label>
                                        <input type="text" name="<?= esc('facebook_link') ?>" value="<?= old_value('facebook_link'), $row->facebook_link ?>" class="form-control mb-1" id="facebook_link">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="tiktok_link">Tiktok Link</label>
                                        <input type="text" name="<?= esc('tiktok_link') ?>" value="<?= old_value('tiktok_link'), $row->tiktok_link ?>" class="form-control mb-1" id="tiktok_link">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="instagram_link">Instagram Link</label>
                                        <input type="text" name="<?= esc('instagram_link') ?>" value="<?= old_value('instagram_link'), $row->instagram_link ?>" class="form-control mb-1" id="instagram_link">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="linkedin">LinkedIn</label>
                                        <input type="text" name="<?= esc('linkedin') ?>" value="<?= old_value('linkedin'), $row->linkedin ?>" class="form-control mb-1" id="linkedin">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-success">EDIT DETAILS</button>
                                        <a href="<?= ROOT ?>/admin/link" class="btn btn-danger">CANCEL</a>
                                    </div> 
                                </div>
                            </form>
                        <?php else : ?>
                            <div class="row pagetitle mt-3">
                                <h5 class="text-center">Institution Social Links</h5>
                            </div>
                            <?= Util::displayFlash('link_update_success','success') ?>
                            <div class="row mt-3">
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($social_links)) :
                                            foreach ($social_links as $row) :
                                        ?>
                                                <tr>
                                                    <th scope="col">Twitter:</th>
                                                    <td><?= $row->twitter_link ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Facebook:</th>
                                                    <td><?= $row->facebook_link ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tiktok:</th>
                                                    <td><?= $row->tiktok_link ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Instagram:</th>
                                                    <td><?= $row->instagram_link ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">LinkedIn:</th>
                                                    <td><?= $row->linkedin ?></td>
                                                </tr>

                                                <?php if ($admin_user) : ?>
                                                    <tr>
                                                        <th scope="col">Action:</th>
                                                        <td><a href="<?= ROOT ?>/admin/link/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a></td>
                                                    </tr>
                                                <?php endif; ?>


                                            <?php endforeach;
                                        else :  ?>
                                            <div class="alert alert-danger text-center">
                                                No records found
                                            </div>
                                        <?php endif;
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