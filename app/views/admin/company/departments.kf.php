<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome', $data); ?>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($action == 'new') : ?>
                            <div class="row my-3">
                                <h4>ADD NEW DEPARTMENT</h4>
                            </div>

                            <form method="POST" action="">
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
                                    <div class="col-lg-12">
                                        <label for="name">Department Name</label>
                                        <input type="text" name="<?= esc('name') ?>" value="<?= old_value('name') ?>" class="form-control mb-1" id="name">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW DEPARTMENT</button>
                                        <a href="<?= ROOT ?>/admin/departments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT DEPARTMENT</h4>
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
                                        <label for="name">Department Name</label>
                                        <input type="text" name="<?= esc('name') ?>" value="<?= old_value('name', $row->name) ?>" class="form-control mb-1" id="deptname">
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">EDIT DEPARTMENT</button>
                                        <a href="<?= ROOT ?>/admin/departments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE </h3>
                            </div>
                            <form method="post">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="name"></label>
                                        <div class="form-control mb-1"><?= $row->name ?></div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE DEPARTMENT</button>
                                        <a href="<?= ROOT ?>/admin/departments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/departments/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW DEPARTMENT</a>
                            </div>
                            <hr>
                            
                            <?= Util::displayFlash('dept_create_success', 'success') ?>
                            <?= Util::displayFlash('dept_update_success', 'success') ?>
                            <?= Util::displayFlash('dept_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($departments)) :
                                            foreach ($departments as $row) :
                                        ?>
                                                <tr>
                                                    <th><?= $userRows++ ?></th>
                                                    <td><?= $row->name ?></td>
                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/departments/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                            <a href="<?= ROOT ?>/admin/departments/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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