<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">
    <?php $this->view('admin/inc/admin-welcome', $data); ?>
    <!--Module registration success message, eg Patients, Students, etc...-->
    <?= Util::displayFlash('module_reg_success', 'success') ?>
    <?= Util::displayFlash('module_update_success', 'success') ?>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Customers <span>| Today - <?= date('Y-m-d') ?></span><a href="<?= ROOT ?>/admin/customers/new"><i class="bi bi-plus bg-<?= THEME_COLOR ?> text-light float-end" style="border-radius:20px"></i></a></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                        <div class="ps-3">
                                            <h6><?= $customers ? count($customers) : '0' ?></h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- End  Customers Card -->

                    <!-- Payments Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Payments <span>| This Month</span><a href="<?= ROOT ?>/admin/payments/new"><i class="bi bi-plus bg-<?= THEME_COLOR ?> text-light float-end" style="border-radius:20px"></i></a></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-credit-card text-secondary"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $sumPayments->total_payments ? DEF_CURR . $sumPayments->total_payments : DEF_CURR . '0.00' ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Payments Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>

        <!--NOTIFICATIONS/ANNOUNCEMENTS-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <h5 class="card-title mx-3"><strong><u><?= 'NOTIFICATIONS/ANNOUNCEMENTS' ?> </u></strong></h5>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table datatable px-2" style="font-size: 12px;">
                            <thead class="bg-<?= THEME_COLOR ?> text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?= 'Date' ?></th>
                                    <th scope="col"><?= 'Announcer' ?></th>
                                    <th scope="col"><?= 'Announcement ID' ?></th>
                                    <th scope="col"><?= 'Announcement' ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userRows = 1;
                                if (!empty($notifications)) :
                                    foreach ($notifications as $row) :
                                ?>
                                        <tr>
                                            <th scope="row"><?= $userRows++ ?></th>
                                            <td><?= $row->date_created ?></td>
                                            <td><?= $row->created_by ?></td>
                                            <td><?= $row->noti_id ?></td>
                                            <td><?= $row->message ?></td>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>
        <!--REPORTS/COMPLAINTS-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <h5 class="card-title mx-3"><strong><u><?= 'RECENT PAYMENTS' ?> </u></strong></h5>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table datatable px-2" style="font-size: 12px;">
                            <thead class="bg-<?= THEME_COLOR ?> text-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?= 'Payment Date' ?></th>
                                    <th scope="col"><?= 'Customer' ?></th>
                                    <th scope="col"><?= 'Invoice' ?></th>
                                    <th scope="col"><?= 'Amount' ?></th>                                 
                                    <th scope="col"><?= 'Gateway' ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $userRows = 1;
                                if (!empty($recentPayments)) : 
                                    foreach ($recentPayments as $row) : 
                                ?>
                                        <tr>
                                            <th scope="row"><?= $userRows++ ?></th>
                                            <td><?= $row->pay_date ?></td>
                                            <td><?= $row->firstname . ' ' . $row->surname ?></td>
                                            <td><?= $row->invoice ?></td>
                                            <td><?= $row->amount ?></td>
                                            <td><?= $row->type ?></td>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->
                </div>
            </div>
        </div>

    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>