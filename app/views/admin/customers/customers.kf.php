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
                                <h3 class="text-center">ADD NEW CUSTOMER</h3>
                            </div>
                            <form method="POST" action="" id="customer-new" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER CREATING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <?= Util::displayFlash('tenant_register_error', 'danger') ?>
                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label> Profile Image <br>
                                            <img src="<?= get_image('', 'user') ?>" class="rounded-circle" width="80px" height="80px" style=" object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="<?= esc('firstname') ?>" value="<?= old_value('firstname') ?>" class="form-control mb-1" id="firstname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="surname">Surname</label>
                                        <input type="text" name="<?= esc('surname') ?>" value="<?= old_value('surname') ?>" class="form-control mb-1" id="surname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="username">Username</label>
                                        <input type="text" name="<?= esc('username') ?>" value="<?= old_value('username') ?>" class="form-control mb-1" id="username">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="email">email</label>
                                        <input type="email" name="<?= esc('email') ?>" value="<?= old_value('email') ?>" class="form-control mb-1" id="email">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="<?= esc('password') ?>" value="<?= old_value('password') ?>" class="form-control mb-1" id="password">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="user_role">User Role</label>
                                        <input type="text" name="<?= esc('user_role') ?>" value="Customer" class="form-control mb-1" id="user_role" readonly>

                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="user_id">User ID</label>
                                        <input type="text" name="<?= esc('user_id') ?>" value="<?= rand(10001, 99099) ?>" class="form-control mb-1" id="user_id" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone') ?>" class="form-control mb-1" id="phone">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="gender">Gender</label>
                                        <select name="<?= esc('gender') ?>" class="form-control mb-1" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="domicilium">Domicilium (Home Address)</label>
                                        <input type="text" name="<?= esc('domicilium') ?>" value="<?= old_value('domicilium') ?>" class="form-control mb-1" id="domicilium">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="id_number">ID Number (Govt)</label>
                                        <input type="text" name="<?= esc('id_number') ?>" value="<?= old_value('id_number') ?>" class="form-control mb-1" id="id_number">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="emerge_cont_person">Emergency Contact(FullName)</label>
                                        <input type="text" name="<?= esc('emerge_cont_person') ?>" value="<?= old_value('emerge_cont_person') ?>" class="form-control mb-1" id="emerge_cont_person">
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="monthly_net">Monthly Net (R)</label>
                                        <input type="number" name="<?= esc('monthly_net') ?>" value="<?= old_value('monthly_net') ?>" class="form-control mb-1" id="monthly_net">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="emerge_cont_phone">Emergency Contact Phone</label>
                                        <input type="text" name="<?= esc('emerge_cont_phone') ?>" value="<?= old_value('emerge_cont_phone') ?>" class="form-control mb-1" id="emerge_cont_phone">
                                    </div>


                                    <div class="col-lg-4">
                                        <label for="employer">Employer</label>
                                        <input type="text" name="<?= esc('employer') ?>" value="<?= old_value('employer') ?>" class="form-control mb-1" id="employer">
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="work_cont_name">Work Contact Person</label>
                                        <input type="text" name="<?= esc('work_cont_name') ?>" value="<?= old_value('work_cont_name') ?>" class="form-control mb-1" id="work_cont_name">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_cont_phone">Contact Phone(Work)</label>
                                        <input type="text" name="<?= esc('work_cont_phone') ?>" value="<?= old_value('work_cont_phone') ?>" class="form-control mb-1" id="work_cont_phone">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_service">Work Service (in years)</label>
                                        <input type="text" name="<?= esc('work_service') ?>" value="<?= old_value('work_service') ?>" class="form-control mb-1" id="work_service">
                                    </div>
                                </div>


                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">REGISTER NEW CUSTOMER</button>
                                        <a href="<?= ROOT ?>/admin/customers" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">EDIT CUSTOMER</h3>
                            </div>

                            <form method="POST" action="" id="customer-edit" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--USER EDITING RECORD-->
                                <input type="hidden" name="<?= esc('created_by') ?>" value="<?= user('firstname') . ' ' . user('surname') ?>">
                                <!--DATE RECORD UPDATED-->
                                <input type="hidden" name="<?= esc('date_updated') ?>" value="<?= date('Y-m-d H:i:s') ?>">

                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>

                                <!--ROW 1-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label> Profile Image <br>
                                            <img src="<?= old_value(get_image($row->image), get_image($row->image, 'user'))  ?>" class="rounded-circle" width="80px" height="80px" style=" object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none"> <br> <span style="font-size: 0.6rem;" class="text-danger fw-bold">***You will still need to upload an image even if its the same***</span>
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="<?= esc('firstname') ?>" value="<?= old_value('firstname', $row->firstname) ?>" class="form-control mb-1" id="firstname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="surname">Surname</label>
                                        <input type="text" name="<?= esc('surname') ?>" value="<?= old_value('surname', $row->surname) ?>" class="form-control mb-1" id="surname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="username">Username</label>
                                        <input type="text" name="<?= esc('username') ?>" value="<?= old_value('username', $row->username) ?>" class="form-control mb-1" id="username">
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="email">email</label>
                                        <input type="email" name="<?= esc('email') ?>" value="<?= old_value('email', $row->email) ?>" class="form-control mb-1" id="email">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="<?= esc('password') ?>" value="<?= old_value('password') ?>" class="form-control mb-1" id="password">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="user_role">User Role</label>
                                        <input type="text" name="<?= esc('user_role') ?>" value="customer" class="form-control mb-1" id="user_role" readonly>

                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="user_id">User ID</label>
                                        <input type="text" name="<?= esc('user_id') ?>" value="<?= $row->user_id ?>" class="form-control mb-1" id="user_id" readonly>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone', $row->phone) ?>" class="form-control mb-1" id="phone">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="gender">Gender</label>
                                        <?php $selGender = old_value('gender', $row->gender) ?>
                                        <select name="<?= esc('gender') ?>" class="form-control mb-1" id="gender">
                                            <option value="Male" <?= $selGender == 'Male' ? 'selected' : '' ?>>Male</option>
                                            <option value="Female" <?= $selGender == 'Female' ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="domicilium">Domicilium (Home Address)</label>
                                        <input type="text" name="<?= esc('domicilium') ?>" value="<?= old_value('domicilium', $row->domicilium) ?>" class="form-control mb-1" id="domicilium">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="id_number">ID Number (Govt)</label>
                                        <input type="text" name="<?= esc('id_number') ?>" value="<?= old_value('id_number', $row->id_number) ?>" class="form-control mb-1" id="id_number">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="monthly_net">Monthly Net (R)</label>
                                        <input type="number" name="<?= esc('monthly_net') ?>" value="<?= old_value('monthly_net', $row->monthly_net) ?>" class="form-control mb-1" id="monthly_net">
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="emerge_cont_person">Emergency Contact Person (FullName)</label>
                                        <input type="text" name="<?= esc('emerge_cont_person') ?>" value="<?= old_value('emerge_cont_person', $row->emerge_cont_person) ?>" class="form-control mb-1" id="emerge_cont_person">
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="emerge_cont_phone">Emergency Contact Phone</label>
                                        <input type="text" name="<?= esc('emerge_cont_phone') ?>" value="<?= old_value('emerge_cont_phone', $row->emerge_cont_phone) ?>" class="form-control mb-1" id="emerge_cont_phone">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="employer">Employer</label>
                                        <input type="text" name="<?= esc('employer') ?>" value="<?= old_value('employer', $row->employer) ?>" class="form-control mb-1" id="employer">
                                    </div>
                                </div>
                                <!--ROW 7-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="work_cont_name">Contact Person</label>
                                        <input type="text" name="<?= esc('work_cont_name') ?>" value="<?= old_value('work_cont_name', $row->work_cont_name) ?>" class="form-control mb-1" id="work_cont_name">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_cont_phone">Contact Phone(Work)</label>
                                        <input type="text" name="<?= esc('work_cont_phone') ?>" value="<?= old_value('work_cont_phone', $row->work_cont_phone) ?>" class="form-control mb-1" id="work_cont_phone">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_service">Work Service (in years)</label>
                                        <input type="text" name="<?= esc('work_service') ?>" value="<?= old_value('work_service', $row->work_service) ?>" class="form-control mb-1" id="work_service">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">UPDATE CUSTOMER DETAILS</button>
                                        <a href="<?= ROOT ?>/admin/customers" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE CUSTOMER</h3>
                            </div>
                            <form method="POST" action="" id="customer-edit" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
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
                                    <div class="col-lg-12 text-center">
                                        <label> Profile Image <br>
                                            <img src="<?= old_value(get_image($row->image), get_image($row->image, 'user'))  ?>" class="rounded-circle" width="80px" height="80px" style=" object-fit:cover;">
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <!--ROW 2-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="firstname">First Name</label>
                                        <div class="form-control mb-1"><?= $row->firstname ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="surname">Surname</label>
                                        <div class="form-control mb-1"><?= $row->surname ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="username">Username</label>
                                        <div class="form-control mb-1"><?= $row->username ?></div>
                                    </div>
                                </div>
                                <!--ROW 3-->
                                <div class="row form-row">
                                    <div class="col-lg-4">
                                        <label for="email">email</label>
                                        <div class="form-control mb-1"><?= $row->email ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="password">Password</label>
                                        <div class="form-control mb-1"><?= 'REDUCTED' ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="user_role">User Role</label>
                                        <div class="form-control mb-1"><?= $row->user_role ?></div>

                                    </div>
                                </div>
                                <!--ROW 4-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="user_id">User ID</label>
                                        <div class="form-control mb-1"><?= $row->user_id ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="phone">Phone</label>
                                        <div class="form-control mb-1"><?= $row->phone ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="gender">Gender</label>
                                        <div class="form-control mb-1"><?= $row->gender ?></div>
                                    </div>
                                </div>
                                <!--ROW 5-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="domicilium">Domicilium (Home Address)</label>
                                        <div class="form-control mb-1"><?= $row->domicilium ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="id_number">ID Number (Govt)</label>
                                        <div class="form-control mb-1"><?= $row->id_number ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="monthly_net">Monthly Net (R)</label>
                                        <div class="form-control mb-1"><?= $row->monthly_net ?></div>
                                    </div>
                                </div>
                                <!--ROW 6-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="emerge_cont_person">Emergency Contact Person (FullName)</label>
                                        <div class="form-control mb-1"><?= $row->emerge_cont_person ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="emerge_cont_phone">Emergency Contact Phone</label>
                                        <div class="form-control mb-1"><?= $row->emerge_cont_phone ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="employer">Employer</label>
                                        <div class="form-control mb-1"><?= $row->employer ?></div>
                                    </div>
                                </div>
                               <!--ROW 7-->
                                <div class=" row form-row">
                                    <div class="col-lg-4">
                                        <label for="work_cont_name">Contact Person</label>
                                        <div class="form-control mb-1"><?= $row->work_cont_name ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_cont_phone">Contact Phone(Work)</label>
                                        <div class="form-control mb-1"><?= $row->work_cont_phone ?></div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="work_service">Work Service (in years)</label>
                                        <div class="form-control mb-1"><?= $row->work_service ?></div>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE CUSTOMER</button>
                                        <a href="<?= ROOT ?>/admin/customers" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'view') : ?>

                            <?php
                            $user_id = basename($_GET['url']);
                            // customer Object
                            $customer = new customer;
                            // Single customer
                            $singleCustomerInfo = $customer->singleCustomerAllModules($user_id);
                            ?>
                            <section class="section">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <!--Display Patient-->

                                                <section class="section profile mt-5">
                                                    <?php
                                                    switch ($_SESSION['userRole']) {
                                                        case 'customer':
                                                            # silence is platinum
                                                            break;

                                                        default: ?>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT . '/admin/customers' ?>" style="border-radius:20px"><i class="bi bi-arrow-left"></i> BACK TO CUSTOMERS</a>
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
                                                                            <button class="nav-link text-warning" data-bs-toggle="tab" data-bs-target="#documents">Documents</button>
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
                                                                                                    if (!empty($payments)) : foreach ($payments as $payRow) : ?>
                                                                                                        <th scope="row"><?= $userRow++ ?></th>
                                                                                                        <td><?= $payRow->pay_date ?></td>
                                                                                                        <td><?= $payRow->invoice ?></td>
                                                                                                        <td><?= $payRow->amount ?></td>
                                                                                                        <td><?= $payRow->type ?></td>
                                                                                                        <td><?= $payRow->notes ? $row->notes : 'Nothing Noted' ?></td>
                                                                                                        <td>
                                                                                                            <div class="text-center d-flex">
                                                                                                                <a href="<?= ROOT ?>/admin/payments/view/<?= $payRow->id ?>"><i class="bi bi-eye text-success m-2"></i></a>
                                                                                                            </div>
                                                                                                        </td>
                                                                                            </tr>
                                                                                    <?php endforeach;
                                                                                                    endif; ?>
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

                        <?php else : ?>
                            <div class="row mt-3">
                                <a href="<?= ROOT ?>/admin/customers/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW CUSTOMER</a>
                                <hr>
                            </div>
                            <?= Util::displayFlash('cust_register_success', 'success') ?>
                            <?= Util::displayFlash('cust_update_success', 'success') ?>
                            <?= Util::displayFlash('cust_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <div class="col-lg 12 table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Profile Image</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $userRows = 1;
                                            if (!empty($customers)) :
                                                foreach ($customers as $row) :
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?= $userRows++ ?></th>
                                                        <td> <img src="<?= get_image($row->image, 'user') ?>" width="50px" height="50px" class="rounded-circle"></td>
                                                        <td><?= $row->firstname . ' ' . $row->surname ?></td>
                                                        <td><?= $row->gender ?></td>

                                                        <td><?= $row->phone ?></td>
                                                        <td>
                                                            <div class="text-center d-flex">
                                                                <a href="<?= ROOT ?>/admin/customers/view/<?= $row->user_id ?>"><i class="bi bi-eye-fill m-2 text-success"></i></a>
                                                                <a href="<?= ROOT ?>/admin/customers/edit/<?= $row->user_id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                                <a href="<?= ROOT ?>/admin/customers/delete/<?= $row->user_id ?>" onclick="alert('Are you sure you want to delete this user? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                            <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->
<script>
    /**
     * Change Image
     * @param {*} file  
     * */
    function change_image(file) {
        var obj = {};
        obj.image = file;
        obj.data_type = "profile-image";
        obj.id = "<?= user('id') ?>";

        send_data(obj);
    }

    /**
     * Send Data
     * @param {*} obj  
     * */
    function send_data(obj) {
        var kfForm = new FormData();
        for (key in obj) {
            kfForm.append(key, obj[key]);
        }
        var ajax = new XMLHttpRequest();
        // Add event listener
        ajax.addEventListener('readystatechange', (e) => {
            if (ajax.readyState == 4 && ajax.status == 200) {
                handle_result(ajax.responseText);
            }
        });

        ajax.open('post', '<?= ROOT ?>/ajax', true);
        ajax.send(kfForm);

        /**
         * Handle result
         * @param {*} result  
         * */
        function handle_result(result) {
            alert(result);
            console.log(result);
        }
    }
</script>

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>