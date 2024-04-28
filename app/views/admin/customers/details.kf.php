<?php $this->view('admin/inc/admin-header', $data); ?>

<!-- ======= Sidebar ======= -->
<?php $this->view('admin/inc/admin-sidebar'); ?>

<main id="main" class="main">
    <div class="pagetitle">
        <?php $this->view('admin/inc/admin-welcome', $data); ?>
    </div><!-- End Page Title -->

    <?php if (!empty($notifications)) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h4 class="text-center"><strong> ANNOUNCEMENTS</strong></h4>
            <?php foreach ($notifications as $notiRow) : $rc = 1 ?>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Announcement</th>
                                    <th scope="col">Message ID</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $rc++ ?></th>

                                    <td><?= $notiRow->date_created ?></td>
                                    <td><?= $notiRow->message ?></td>
                                    <td><?= $notiRow->noti_id ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endforeach ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!--Display customer details-->
                        <section class="section profile mt-5">
                            <?php
                            switch ($_SESSION['userRole']) {
                                case 'Customer':
                                    # silence is platinum
                                    break;

                                default: ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT . '/admin' ?>" style="border-radius:20px"><i class="bi bi-arrow-left"></i> BACK TO DASHBOARD</a>
                                        </div>
                                    </div>

                                    <hr>
                            <?php
                                    break;
                            }
                            ?>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                            <img src="<?= get_image($singleCustomerInfo->image, 'user') ?>" alt="Profile Image" class="rounded-circle">
                                            <h3 class="text-center mt-1">
                                                <strong><?= strtoupper($singleCustomerInfo->user_firstname . ' ' . $singleCustomerInfo->user_surname) ?></strong>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body profile-card pt-4 d-flex flex-column shadow">
                                            <h3 class="text-center"><strong><u>CUSTOMER NUMBER:</u></strong></h3>
                                            <h3 class="btn btn-outline-danger"><?= $singleCustomerInfo->user_id ?></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <!-- Bordered Tabs -->
                                            <ul class="nav nav-tabs nav-tabs-bordered">

                                                <li class="nav-item">
                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#work">Employment</button>
                                                </li>
                                                <li class="nav-item">
                                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#nextOfkin">Next Of Kin</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                    <h5 class="card-title">Customer Details</h5>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">ID Number</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->id_number ? $singleCustomerInfo->id_number : 'N/A' ?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->user_phone ? $singleCustomerInfo->user_phone : 'N/A' ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->user_email ? $singleCustomerInfo->user_email : 'N/A' ?>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Home Address</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->domicilium ? $singleCustomerInfo->domicilium : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade show profile-overview" id="work">
                                                    <h5 class="card-title">Employment Details</h5>

                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Employer</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->employer ? $singleCustomerInfo->employer : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Contact Person</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->work_cont_name ? $singleCustomerInfo->work_cont_name : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Contact Number</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->work_cont_phone ? $singleCustomerInfo->work_cont_phone : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Work Service (in years)</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->work_service ? $singleCustomerInfo->work_service : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show profile-overview" id="nextOfkin">
                                                    <h5 class="card-title">Next Of Kin</h5>

                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Name</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->emerge_cont_person ? $singleCustomerInfo->emerge_cont_person : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                                        <div class="col-lg-9 col-md-8">
                                                            <?= $singleCustomerInfo->emerge_cont_phone ? $singleCustomerInfo->emerge_cont_phone : 'Not Mentioned' ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Bordered Tabs -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <!-- Bordered Tabs -->
                                            <ul class="nav nav-tabs nav-pills nav-justified nav-tabs-bordered p-2 bg-<?= THEME_COLOR ?>" style="border-radius:5px">

                                                <li class="nav-item">
                                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#payments">Payments</button>
                                                </li>

                                                <li class="nav-item">
                                                    <button class="nav-link text-dark" data-bs-toggle="tab" data-bs-target="#documents">Documents</button>
                                                </li>

                                            </ul>
                                            <div class="tab-content pt-2">
                                                <div class="tab-pane fade show active profile-overview" id="payments">
                                                    <h5 class="card-title">Customer list of payments</h5>
                                                    <div class="row">
                                                        <div class="col-lg-12 table-responsive">
                                                            <!-- Table with stripped rows -->
                                                            <table class="table datatable">

                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Payment Date</th>
                                                                        <th scope="col">Invoice</th>
                                                                        <th scope="col">Amount</th>
                                                                        <th scope="col">Type</th>
                                                                        <th scope="col">Notes</th>
                                                                        <th scope="col">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr> <?php $userRow = 1;
                                                                            if (!empty($payments)) : foreach ($payments as $pRow) : ?>

                                                                                <th scope="row"><?= $userRow++ ?></th>
                                                                                <td><?= $pRow->pay_date ?></td>
                                                                                <td><?= $pRow->invoice ?></td>
                                                                                <td><?= $pRow->amount ?></td>
                                                                                <td><?= $pRow->type ?></td>
                                                                                <td><?= $pRow->notes ? $pRow->notes : 'Nothing Noted' ?></td>
                                                                                <td>
                                                                                    <div class="text-center d-flex">
                                                                                        <a href="<?= ROOT ?>/admin/payments/view/<?= $pRow->id ?>"><i class="bi bi-eye text-success m-2"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                    </tr>
                                                            <?php endforeach;
                                                                            endif ?>
                                                                </tbody>
                                                            </table>
                                                            <!-- End Table with stripped rows -->
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade show profile-overview" id="documents">
                                                    <h5 class="card-title">Documents</h5>
                                                    <div class="row">
                                                        <div class="col-lg-12 table-responsive">
                                                            <!-- Table with stripped rows -->
                                                            <table class="table datatable">

                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Date</th>
                                                                        <th scope="col">Time</th>
                                                                        <th scope="col">Document</th>
                                                                        <th scope="col">Document Name</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $userRows = 1;
                                                                    if (!empty($stdoc)) :
                                                                        foreach ($stdoc as $row) :
                                                                    ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $userRows++ ?></th>

                                                                                <td><?= $row->date ?></td>
                                                                                <td><?= $row->Time ?></td>
                                                                                <td>
                                                                                    <a href="<?= get_doc($row->document) ?>">
                                                                                        <?= $row->document ?>
                                                                                    </a>
                                                                                </td>
                                                                                <td><?= $row->document_name ?></td>
                                                                            </tr>
                                                                    <?php
                                                                        endforeach;
                                                                    endif;
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <!-- End Table with stripped rows -->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div><!-- End Bordered Tabs -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
    </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>