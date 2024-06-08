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
                                <h4>UPLOAD NEW DOCUMENT</h4>
                            </div>

                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER CREATING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE UPLOADED-->
                                <input type="hidden" name="<?= esc('date') ?>" value="<?= date('Y-m-d') ?>">
                                <!--TIME UPLOADED-->
                                <input type="hidden" name="<?= esc('Time') ?>" value="<?= date('H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--Upload Document-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="customer">Customer</label>
                                        <select name="<?= esc('customer') ?>" class="form-control mb-1 sel" id="customer">
                                            <option value="Select customer">--Select Customer--</option>
                                            <?php if ($customerList) : foreach ($customerList as $custRow) : ?>
                                                    <option value="<?= $custRow->user_id ?>"><?= $custRow->surname . ' ' . $custRow->firstname ?></option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change Document</h6>

                                            <input onchange="display_pdf(this.files[0], event)" type="file" name="<?= esc('document') ?>">
                                        </label>

                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="document_name">Document Name</label>
                                        <input type="text" name="<?= esc('document_name') ?>" value="<?= old_value('document_name') ?>" class="form-control mb-1" id="document_name">
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE DOCUMENT UPLOAD</button>

                                        <a href="<?= ROOT ?>/admin/documents" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h4>EDIT POST</h4>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER UPDATING RECORD-->
                                <input type="hidden" name="<?= esc('updated_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--Upload Document-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="customer">customer</label>
                                        <?php $selectedtenantId = $row->customer ?>
                                        <select name="<?= esc('customer') ?>" class="form-control mb-1" id="customer">
                                            <option value="Select customer">--Select customer--</option>
                                            <?php if ($tenantList) : foreach ($tenantList as $patRow) : ?>
                                                    <option value="<?= $patRow->id ?>" <?= $patRow->id == $selectedCustomerId ? 'selected' : '' ?>>
                                                        <?= $patRow->Surname . ' ' . $patRow->First_Name ?>
                                                    </option>
                                            <?php endforeach;
                                            endif; ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <h6 class="text-center" style="cursor:pointer">Click to upload/change Document</h6>
                                            <object id="pdfViewer" data="<?= get_doc($row->document) ?>" type="application/pdf" style="width:300px; height:300px;"></object>
                                            <input onchange="display_pdf(this.files[0], event)" type="file" name="<?= esc('document') ?>" class="d-none">
                                        </label>
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="document_name">Document Name</label>
                                        <input type="text" name="<?= esc('document_name') ?>" value="<?= old_value('document_name',$row->document_name) ?>" class="form-control mb-1" id="document_name">
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">SAVE DOCUMENT</button>
                                        <a href="<?= ROOT ?>/admin/documents" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE POST</h3>
                            </div>
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--RECORD(S) DELETED-->
                                <input type="hidden" name="<?= esc('record_deleted') ?>" value="Customer ID = <?= $row->customer . ', Document =  ' . $row->document ?>">
                                <!--USER DELETING RECORD-->
                                <input type="hidden" name="<?= esc('deleted_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD DELETED-->
                                <input type="hidden" name="<?= esc('date_deleted') ?>" value="<?= date('Y-m-d H:i:s') ?>">
                                <!--TABLE-->
                                <input type="hidden" name="<?= esc('from_table') ?>" value="<?= $page_title ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <!--Upload Document-->
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="customer">customer</label>
                                        <div class="form-control mb-1"><?= $row->customer ?></div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <object id="pdfViewer" data="<?= get_doc($row->document) ?>" type="application/pdf" style="width:300px; height:300px;"></object>

                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-12">
                                        <label for="document_name">Document Name</label>
                                        <div type="text" class="form-control mb-1"><?= $row->document_name ?></div>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE DOCUMENT</button>
                                        <a href="<?= ROOT ?>/admin/documents" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php else : ?>

                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/documents/new" class="btn btn-outline-<?= THEME_COLOR ?>">UPLOAD NEW DOCUMENT</a>
                            </div>
                            <hr>
                            
                            <?= Util::displayFlash('doc_upload_success', 'success') ?>
                            <?= Util::displayFlash('doc_update_success', 'success') ?>
                            <?= Util::displayFlash('doc_delete_success', 'success') ?>
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">

                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Time</th>
                                                <th scope="col">customer</th>
                                                <th scope="col">Document</th>
                                                <th scope="col">Document Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userRows = 1;
                                            if (!empty($rows)) :
                                                foreach ($rows as $row) :
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $userRows++ ?></th>

                                                        <td><?= $row->date ?></td>
                                                        <td><?= $row->Time ?></td>
                                                        <td><?= $row->customer ?></td>
                                                        <td>
                                                            <a href="<?= get_doc($row->document) ?>">
                                                                <?= $row->document ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $row->document_name ?></td>
                                                        <td>
                                                            <div class="text-center d-flex">
                                                                <a href="<?= ROOT ?>/admin/documents/edit/<?= $row->doc_Id ?>"><i class="bi bi-pencil-square m-2"></i></a>
                                                                <a href="<?= ROOT ?>/admin/documents/delete/<?= $row->doc_Id ?>" onclick="alert('Are you sure you want to delete this record? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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
<script>
    $(document).ready(function() {
        $('.selCustomer').select2({
            theme: 'bootstrap-5'
        });
    });
</script>