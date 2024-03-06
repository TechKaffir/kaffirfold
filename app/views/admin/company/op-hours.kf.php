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
                        <?php if ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">EDIT <?= strtoupper($page_title) ?> DETAILS</h3>
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
                                        <label for="mon">Monday:</label>
                                        <input type="text" name="mon" value="<?= old_value('mon'), $op_hours[0]->mon ?>" class="form-control mb-1" id="op_hour_mon">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="tue">Tuesday:</label>
                                        <input type="text" name="tue" value="<?= old_value('tue'), $op_hours[0]->tue ?>" class="form-control mb-1" id="op_hour_tue">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="wed">Wednesday:</label>
                                        <input type="text" name="wed" value="<?= old_value('wed'), $op_hours[0]->wed ?>" class="form-control mb-1" id="op_hour_wed">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="thu">Thursday:</label>
                                        <input type="text" name="thu" value="<?= old_value('thu'), $op_hours[0]->thu ?>" class="form-control mb-1" id="op_hour_thu">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="fri">Friday:</label>
                                        <input type="text" name="fri" value="<?= old_value('fri'), $op_hours[0]->fri ?>" class="form-control mb-1" id="op_hour_fri">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="sat">Saturday:</label>
                                        <input type="text" name="sat" value="<?= old_value('sat'), $op_hours[0]->sat ?>" class="form-control mb-1" id="op_hour_sat">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="sun">Sunday:</label>
                                        <input type="text" name="sun" value="<?= old_value('sun'), $op_hours[0]->sun ?>" class="form-control mb-1" id="op_hour_sun">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-primary">EDIT DETAILS</button>
                                        <a href="<?= ROOT ?>/admin/operatinghours" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>
                            <div class="row pagetitle mt-3">
                                <h5 class="text-center"><?= $page_title ?></h5>
                            </div>
                            
                            <?= Util::displayFlash('ophours_update_success', 'success') ?>
                            <div class="row mt-3">
                                <!-- Table with stripped rows -->
                                <table class="table table-striped">
                                    <tbody>
                                        <?php
                                        $userRows = 1;
                                        if (!empty($op_hours)) :
                                            foreach ($op_hours as $row) :
                                        ?>
                                                <tr>
                                                    <th scope="col">Monday:</th>
                                                    <td><?= $row->mon ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Tuesday:</th>
                                                    <td><?= $row->tue ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Wednesday:</th>
                                                    <td><?= $row->wed ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Thursday:</th>
                                                    <td><?= $row->thu ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Friday:</th>
                                                    <td><?= $row->fri ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Saturday:</th>
                                                    <td><?= $row->sat ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Sunday:</th>
                                                    <td><?= $row->sun ?></td>
                                                </tr>
                                                <?php
                                                switch ($_SESSION['userRole']) {
                                                    case 'Admin':
                                                    case 'Doctor':
                                                    case 'Sister':
                                                ?>
                                                        <tr>
                                                            <th scope="col">Action:</th>
                                                            <td><a href="<?= ROOT ?>/admin/operatinghours/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2"></i></a></td>
                                                        </tr>
                                                <?php break;

                                                    default:
                
                                                        break;
                                                }
                                                ?>

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