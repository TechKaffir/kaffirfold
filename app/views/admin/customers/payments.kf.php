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
                                <h5>ADD PAYMENT</h5>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="pay_date ">Payment Date</label>
                                        <input type="date" name="<?= esc('pay_date') ?>" value="<?= old_value('pay_date') ?>" class="form-control mb-1" id="pay_date">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="customer">Customer</label>

                                        <select name="<?= esc('customer') ?>" class="form-control mb-1 sel" id="customer">
                                            <option value="">--Select customer--</option>
                                            <?php if ($customers) : foreach ($customers as $custRow) : ?>
                                                    <?php $selCustomer = old_value('customer') ?>
                                                    <option value="<?= $custRow->user_id ?>" <?= $selCustomer == $custRow->user_id ? 'selected' : '' ?>><?= $custRow->firstname . ' ' . $custRow->surname ?></option>
                                            <?php endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>

                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="amount">Payment Amount(R)</label>
                                        <input type="number" name="<?= esc('amount') ?>" value="<?= old_value('amount') ?>" class="form-control mb-1" id="amount" placeholder=0.00>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="type">Payment Type(EFT,Cash,CC)</label>
                                        <?php $selRentMonth = old_value('type') ?>
                                        <select name="<?= esc('type') ?>" class="form-control mb-1" id="type">
                                            <option value="">--Select Payment Type--</option>
                                            <option value="EFT" <?= $selRentMonth == 'EFT' ? 'selected' : '' ?>>EFT</option>
                                            <option value="Cash" <?= $selRentMonth == 'Cash' ? 'selected' : '' ?>>Cash</option>
                                            <option value="Credit Card" <?= $selRentMonth == 'Credit Card' ? 'selected' : '' ?>>Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="invoice">Invoice</label>

                                        <select name="<?= esc('invoice') ?>" class="form-control mb-1 sel" id="invoice">
                                            <option value="">--Select Invoice--</option>
                                            <?php if ($invoices) : foreach ($invoices as $invRow) : ?>
                                                    <?php $selInv = old_value('invoice') ?>
                                                    <option value="<?= $invRow->id ?>" <?= $selInv == $invRow->id ? 'selected' : '' ?>><?= $invRow->inv_no ?></option>
                                            <?php endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="created_by">Record Added by</label>
                                        <input type="text" name="<?= esc('created_by') ?>" class="form-control mb-1" id="created_by" value="<?= user('firstname') . ' ' . user('surname') ?>" readonly>
                                    </div>

                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="notes">Notes(optional)</label>
                                        <textarea name="<?= esc('notes') ?>" class="form-control mb-1" id="notes" cols="30" rows="4"><?= old_value('notes') ?></textarea>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">ADD PAYMENT</button>
                                        <a href="<?= ROOT ?>/admin/payments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h5>EDIT PAYMENT</h5>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
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
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="pay_date ">Payment Date</label>
                                        <input type="date" name="<?= esc('pay_date') ?>" value="<?= old_value('pay_date', $row->pay_date) ?>" class="form-control mb-1" id="pay_date">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="customer">Customer</label>

                                        <select name="<?= esc('customer') ?>" class="form-control mb-1 sel" id="customer">
                                            <option value="">--Select customer--</option>
                                            <?php if ($customers) : foreach ($customers as $custRow) : ?>
                                                    <?php $selCustomer = old_value('customer', $row->customer) ?>
                                                    <option value="<?= $custRow->user_id ?>" <?= $selCustomer == $custRow->user_id ? 'selected' : '' ?>><?= $custRow->firstname . ' ' . $custRow->surname ?></option>
                                            <?php endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                </div>

                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="amount">Payment Amount(R)</label>
                                        <input type="number" name="<?= esc('amount') ?>" value="<?= old_value('amount', $row->amount) ?>" class="form-control mb-1" id="amount">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="type">Payment Type(EFT,Cash,CC)</label>
                                        <?php $selRentType = old_value('type', $row->type) ?>
                                        <select name="<?= esc('type') ?>" class="form-control mb-1" id="type">
                                            <option value="">--Select Payment Type--</option>
                                            <option value="EFT" <?= $selRentType == 'EFT' ? 'selected' : '' ?>>EFT</option>
                                            <option value="Cash" <?= $selRentType == 'Cash' ? 'selected' : '' ?>>Cash</option>
                                            <option value="Credit Card" <?= $selRentType == 'Credit Card' ? 'selected' : '' ?>>Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="invoice">Invoice</label>

                                        <select name="<?= esc('invoice') ?>" class="form-control mb-1" id="invoice">
                                            <option value="">--Select Invoice--</option>
                                            <?php if ($invoices) : foreach ($invoices as $invRow) : ?>
                                                    <?php $selInv = old_value('invoice',$row->invoice) ?>
                                                    <option value="<?= $invRow->id ?>" <?= $selInv == $invRow->id ? 'selected' : '' ?>><?= $invRow->inv_no ?></option>
                                            <?php endforeach;
                                            endif ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="created_by">Record Added by</label>
                                        <input type="text" class="form-control mb-1" id="created_by" value="<?= user('firstname') . ' ' . user('surname') ?>" readonly>
                                    </div>

                                </div>
                                <!--ROW 5-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="notes">Notes(optional)</label>
                                        <textarea name="<?= esc('notes') ?>" class="form-control mb-1" id="notes" cols="30" rows="4"><?= old_value('notes',$row->notes) ?></textarea>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE PAYMENT DETAILS</button>
                                        <a href="<?= ROOT ?>/admin/payments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'view') : ?>

                            <?php if (user('user_id') != $scp_specific->customer && $_SESSION['userRole'] != 'Admin' && $_SESSION['userRole'] != 'Landlord' && $_SESSION['userRole'] != 'Admin Clerk') :  ?>
                                <div class="row mt-4">
                                    <?php Util::setFlash('not_allowed_to_view', 'You are not allowed to view the content you\'trying to access!!') ?>
                                    <?= Util::displayFlash('not_allowed_to_view', 'danger') ?>
                                </div>
                                <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT ?>/admin/details" style="border-radius:20px"><i class="bi bi-arrow-left"></i> BACK TO MY DETAILS</a>
                            <?php else :  ?>
                                <div class="d-flex row my-3">
                                    <div class="col-lg-6">
                                        <h5 class="fw-bold">VIEW PAYMENT RECEIPT</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <a class="float-end" href="<?= ROOT . "/PDF/$scp_specific->pay_id" ?>"><span class="btn btn-success">Download PDF</span></a>
                                    </div>
                                </div>
                                <hr>
                                <div class="main">
                                    <div class="row">
                                        <div class="col-md-6 header-text">
                                            <div class="header-info">
                                                <h3>Customer ID: <?= $scp_specific->user_id ?></h3>
                                                <p>
                                                <h2><?= $scp_specific->firstname . ' ' . $scp_specific->surname ?></h2>
                                                <span class="_rec_label_title">Email Address.</span>: <?= $scp_specific->email ?> <br>
                                                
                                                <span class="_rec_label_title">Contact No.</span>: <?= $scp_specific->phone ?> <br>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6 header-info landlord-sec justify-content-end">
                                            <div style="text-align:right;"><img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" width="200px" alt=""></div>

                                            <p style="font-size:14px;text-align:right">
                                                Company Address: <br>
                                                <?= STREET_ADDRESS ?> <br><?= SUBURB ?> <br> <?= CITY ?>, <?= PROVINCE ?> <br>
                                                <?= COUNTRY ?>, <?= ZIP_CODE ?> <br>
                                                Phone: <?= CONTACT_NUMBER ?> <br>
                                                Email Address: <?= EMAIL_ADDRESS ?>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="clear-fix" style="margin-bottom: 60px;"></div>

                                    <h4>PAYMENT DETAILS</h4> <br>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Invoice #</th>
                                                    <th>Notes</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $rc = 1 ?>
                                                <tr>
                                                    <td><?= $rc++ ?></td>
                                                    <td><?= $scp_specific->invoice ?></td>
                                                    <td><?= $scp_specific->notes ?></td>
                                                    <td><?= 'R' . $scp_specific->amount ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h4>TRANSACTION</h4>
                                    <div class="table-container">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Payment Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td><?= $scp_specific->pay_date ?></td>
                                                    <td><?= $scp_specific->type ?></td>
                                                    <td><span class="btn btn-success"><?= 'R' . $scp_specific->amount ?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="footer">
                                    <p class="text-center">
                                        Thank you for the payment you made with us @ <?= APP_NAME ?> <br>
                                    </p>
                                </div>
                            <?php endif ?>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE PAYMENT</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="pay_date ">Payment Date</label>
                                        <div class="form-control mb-1"><?= $row->pay_date ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="customer">Customer</label>
                                        <div class="form-control mb-1"><?= $row->customer ?></div>
                                    </div>
                                </div>
                                
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="amount">Payment Amount(R)</label>
                                        <div class="form-control mb-1"><?= $row->amount ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="type">Payment Type(EFT,Cash,CC)</label>
                                        <div class="form-control mb-1"><?= $row->type ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="invoice">Invoice</label>
                                        <div class="form-control mb-1"><?= $row->invoice ? $row->invoice : 'Empty Input' ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="created_by">Record Added by</label>
                                        <div class="form-control mb-1"><?= $row->created_by ? $row->created_by : 'Empty Input' ?></div>
                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="notes">Notes(optional)</label>
                                        <div class="form-control mb-1"><?= $row->notes ? $row->notes : 'Empty Input' ?></div>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE PAYMENT</button>
                                        <a href="<?= ROOT ?>/admin/payments" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>

                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/payments/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW PAYMENT</a>
                            </div>
                            <hr>

                            <?= Util::displayFlash('payment_add_success', 'success') ?>
                            <?= Util::displayFlash('payment_update_success', 'success') ?>
                            <?= Util::displayFlash('payment_delete_success', 'success') ?>
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Payment Date</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Invoice</th>
                                                <th scope="col">Notes</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userRows = 1;
                                            if (!empty($payments)) :
                                                foreach ($payments as $row) :
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $userRows++ ?></th>

                                                        <td><?= $row->pay_date  ?></td>
                                                        <td><?= $row->firstname . ' ' . $row->surname ?></td>
                                                        <td><?= $row->amount ?></td>
                                                        <td><?= $row->type ?></td>
                                                        <td><?= $row->invoice ?></td>
                                                        <td><?= $row->notes ? $row->notes : 'Nothing Noted' ?></td>
                                                        <td>
                                                            <div class="text-center d-flex">
                                                                <a href="<?= ROOT ?>/admin/payments/view/<?= $row->paymentID ?>"><i class="bi bi-eye text-success m-2"></i></a>
                                                                <a href="<?= ROOT ?>/admin/payments/edit/<?= $row->paymentID ?>"><i class="bi bi-pencil-square m-2"></i></a>
                                                                <a href="<?= ROOT ?>/admin/payments/delete/<?= $row->paymentID ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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