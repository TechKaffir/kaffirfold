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
                    <!-- Consultation Bookings Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Data Card 1 <span>| Today - <?= date('Y-m-d') ?></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-fill"></i> <i class="bi bi-clock"></i>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- End  Consultation Bookings Card -->

                    <!-- Module Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card shadow">
                            <div class="card-body">
                                <h5 class="card-title">Data Card 2 <span>| Total Registered</span><a href="<?= ROOT ?>/admin/module/new"><i class="bi bi-plus bg-<?= THEME_COLOR ?> text-light float-end" style="border-radius:20px"></i></a></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= 0 // $modules ? count($modules) : '0' ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Module Card -->
                </div>
            </div><!-- End Left side columns -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <h5 class="card-title mx-3"><strong><u><?= DATA_TABLE_1 ?> (<?= 0 // $table_records ? count($table_records) : '0' ?>)</u></strong> <a class="btn btn-outline-<?= THEME_COLOR ?> float-end" href="<?= ROOT ?>/admin/module/new">ADD THIS RECORD</a></h5>
                    <!-- Table -->
                    <table class="table datatable px-2" style="font-size: 12px;">
                        <thead class="bg-<?= THEME_COLOR ?> text-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?= TABLE_COLUMN ?></th>
                                <th scope="col"><?= TABLE_COLUMN ?></th>
                                <th scope="col"><?= TABLE_COLUMN ?></th>
                                <th scope="col"><?= TABLE_COLUMN ?></th>
                                <th scope="col"><?= TABLE_COLUMN ?></th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userRows = 1;
                            if (!empty($table_records)) :
                                foreach ($table_records as $row) :
                            ?>
                                    <tr>
                                        <th scope="row"><?= $userRows++ ?></th>
                                        <td><?= $row->record1 ?></td>
                                        <td><?= $row->record2 ?></td>
                                        <td><?= $row->record3 ?></td>
                                        <td><?= $row->record4 ?></td>
                                        <td><?= $row->record5 ?></td>
                                        <td>
                                            <?php
                                            switch ($row->status) {
                                                case 'Status 1': ?>
                                                    <span class="td-btn-secondary">Status 1<span>
                                                        <?php break;
                                                    case 'Status 2': ?>
                                                            <span class="td-btn-warning">Status 2</span>
                                                        <?php break;
                                                    case 'Status 3': ?>
                                                            <span class="td-btn-danger">Status 3</span>
                                                        <?php break;
                                                    case 'Status 4': ?>
                                                            <span class="td-btn-success">Status 4</span>
                                                    <?php break;
                                                }
                                                    ?>
                                        </td>
                                        <td>
                                            <div class="text-center d-flex">
                                                <a href="<?= ROOT ?>/admin/module/view/<?= $row->id ?>">[Notes <i class="bi bi-eye"></i>]</a>
                                                <a href="<?= ROOT ?>/admin/module/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                <a href="<?= ROOT ?>/admin/module/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this module record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>