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
                                <h4>ADD NOTIFICATION</h4>
                            </div>

                            <form method="POST" action="">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER CREATING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <input type="hidden" name="<?= esc('user_id') ?>" value="<?= user('id') ?>">
                                <input type="hidden" name="<?= esc('noti_id') ?>" value="<?= time() ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="message">Message</label>
                                        <input type="text" name="<?= esc('message') ?>" value="<?= old_value('message') ?>" class="form-control mb-1" id="message">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">CREATE NEW NOTIFICATION</button>
                                        <a href="<?= ROOT ?>/admin/notifications" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT NOTIFICATION</h4>
                            </div>
                            <form method="POST" action="">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <input type="hidden" name="<?= esc('user_id') ?>" value="<?= user('id') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="message">Message</label>
                                        <input type="text" name="<?= esc('message') ?>" value="<?= old_value('message', $row->message) ?>" class="form-control mb-1" id="message">
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">EDIT NOTIFICATION</button>
                                        <a href="<?= ROOT ?>/admin/notifications" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'view') : ?>
                            <div class="row my-3">
                                <h4 class="text-center">MESSAGE DETAILS</h4>
                            </div>
                            <div class="card">
                                <?php // debug   ?>
                                <div class="card-header shadow m-3 text-center"><strong>Message ID: <?= $singleNote->noti_id ?></strong></div>
                                <div class="card-header shadow m-3 text-center"><strong>Message Content</strong>
                                    <hr>
                                    <p class="text-success"> <?= $singleNote->message ?></p>
                                </div>
                                <div class="card-footer shadow m-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <strong>Message Date</strong>:
                                            <?= $singleNote->date_created ?>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="float-end">
                                                <strong>Author</strong>: <?= $singleNote->firstname . ' ' . $singleNote->surname ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer shadow m-3">
                                    <div class="row">
                                        <form method="POST" action="">
                                            <input type="hidden" name="seen" value="<?= 1 ?>">
                                            <input type="hidden" name="viewed_by" value="<?= user('id') ?>">
                                            <div class="d-grid gap-2 col-lg-12">
                                                <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">MESSAGE VIEWED ? CLICK HERE</button>
                                                <a href="<?= ROOT ?>/admin/notifications" class="btn btn-danger">CANCEL</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE NOTIFICATION</h3>
                            </div>
                            <form method="POST" action="">
                               <!--CSRF TOKEN-->
                               <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <input type="hidden" name="<?= esc('user_id') ?>" value="<?= user('id') ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="noti_id">Notification ID</label>
                                        <div class="form-control mb-1"><?= $row->noti_id ?></div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="date_created">Date Created</label>
                                        <div class="form-control mb-1"><?= $row->date_created ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="message">Message</label>
                                        <div class="form-control mb-1"><?= $row->message ?></div>
                                    </div>
                                </div>
                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE NOTIFICATION</button>
                                        <a href="<?= ROOT ?>/admin/notifications" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <?php if (user('user_role') == 'Admin' || user('user_role') == 'Manager') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/notifications/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW NOTIFICATION</a>
                                </div>
                                <hr>
                            <?php endif; ?>
                            <?= Util::displayFlash('not_create_success', 'success') ?>
                            <?= Util::displayFlash('not_update_success', 'success') ?>
                            <?= Util::displayFlash('not_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Notification Date</th>
                                            <th>Notification ID</th>
                                            <th>Posted By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($unreadNotifications)) :
                                            foreach ($unreadNotifications as $row) :
                                        ?>
                                                <tr> 
                                                    <th scope="row"><?= $userRows++ ?></th>
                                                    <td><?= $row->date_created ?></td>
                                                    <td><?= $row->noti_id ?></td>
                                                    <td><?= $row->firstname . ' ' . $row->surname ?></td>
                                                    <td><?= $row->seen ?></td>

                                                    <td>
                                                        <div class="text-center d-flex">
                                                            <a href="<?= ROOT ?>/admin/notifications/view/<?= $row->notification_id ?>"><i class="bi bi-eye m-2 text-white bg-success p-1"></i></a>
                                                            <a href="<?= ROOT ?>/admin/notifications/edit/<?= $row->notification_id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                            <a href="<?= ROOT ?>/admin/notifications/delete/<?= $row->notification_id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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
        </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>