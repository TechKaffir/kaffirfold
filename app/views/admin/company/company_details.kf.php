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
                                <h3 class="text-center">EDIT COMPANY DETAILS</h3>
                            </div>
                            <form method="POST" action="">
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
                                    <div class="col-lg-12">
                                        <label for="name">Name:</label>
                                        <input type="text" name="<?= esc('name') ?>" value="<?= old_value('name'), $row->name ?>" class="form-control mb-1" id="company_name">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="about">About:</label>
                                        <textarea class="form-control mb-1" name="<?= esc('about') ?>" cols="30" rows="10"><?= old_value('about'), $row->about ?></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="email">Email:</label>
                                        <input type="email" name="<?= esc('email') ?>" value="<?= old_value('email'), $row->email ?>" class="form-control mb-1" id="email">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="phone">Phone:</label>
                                        <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone'), $row->phone ?>" class="form-control mb-1" id="phone">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="address">Address:</label>
                                        <input type="text" name="<?= esc('address') ?>" value="<?= old_value('address'), $row->address ?>" class="form-control mb-1" id="address">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-success">EDIT DETAILS</button>
                                        <a href="<?= ROOT ?>/admin/companydetails" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php else : ?>
                            <div class="row pagetitle mt-3">
                                <h5 class="text-center"><?= $page_title ?></h5>
                            </div>
                            <?= Util::displayFlash('company_details_update_success','success') ?>
                            <div class="row mt-3">
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($company_details)) :
                                            foreach ($company_details as $row) :
                                        ?>
                                                <tr>
                                                    <th scope="col">Name:</th>
                                                    <td><?= $row->name ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">About:</th>
                                                    <td><?= $row->about ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Email:</th>
                                                    <td><?= $row->email ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Phone:</th>
                                                    <td><?= $row->phone ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Address:</th>
                                                    <td><?= $row->address ?></td>
                                                </tr>


                                                <?php if ($admin_user) : ?>
                                                    <tr>
                                                        <th scope="col">Action:</th>
                                                        <td><a href="<?= ROOT ?>/admin/companydetails/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a></td>
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