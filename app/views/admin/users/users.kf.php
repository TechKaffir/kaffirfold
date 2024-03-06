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
                                <h3 class="text-center">ADD NEW USER</h3>
                            </div>
                            <form method="POST" action="" id="user-new" enctype="multipart/form-data">
                                <!--CSRF TOKEN-->
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--VERIFY TOKEN-->
                                <input type="hidden" name="<?= esc('verify_token') ?>" value="<?= md5(rand()) ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <?= Util::displayFlash('register_error', 'danger') ?>
                                <?= Util::displayFlash('email_exists_error', 'danger') ?>
                                <?= Util::displayFlash('username_exists_error', 'danger') ?>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="<?= esc('firstname') ?>" value="<?= old_value('firstname') ?>" class="form-control mb-1" id="firstname">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="surname">Surname</label>
                                        <input type="text" name="<?= esc('surname') ?>" value="<?= old_value('surname') ?>" class="form-control mb-1" id="surname">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="<?= esc('username') ?>" value="<?= old_value('username') ?>" class="form-control mb-1" id="username">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">email</label>
                                        <input type="email" name="<?= esc('email') ?>" value="<?= old_value('email') ?>" class="form-control mb-1" id="email">
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="<?= esc('password') ?>" value="<?= old_value('password') ?>" class="form-control mb-1" id="password">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="user_role">User Role</label>
                                        <?php $selUserRole = old_value('user_role') ?>
                                        <select name="<?= esc('user_role') ?>" id="user_role" class="form-control mb-1">
                                            <option value="Select Role">--Select User Role--</option>
                                            <option value="Admin" <?= $selUserRole == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="Doctor" <?= $selUserRole == 'Doctor' ? 'selected' : '' ?>>Doctor</option>
                                            <option value="Sister" <?= $selUserRole == 'Sister' ? 'selected' : '' ?>>Sister</option>
                                            <option value="Nurse" <?= $selUserRole == 'Nurse' ? 'selected' : '' ?>>Nurse</option>
                                            <option value="Pharmacy Clerk" <?= $selUserRole == 'Pharmacy Clerk' ? 'selected' : '' ?>>Pharmacy Clerk</option>
                                            <option value="Claims Clerk" <?= $selUserRole == 'Claims Clerk' ? 'selected' : '' ?>>Claims Clerk</option>
                                            <option value="Admin Clerk" <?= $selUserRole == 'Admin Clerk' ? 'selected' : '' ?>>Admin Clerk</option>
                                            <option value="Receptionist" <?= $selUserRole == 'Receptionist' ? 'selected' : '' ?>>Receptionist</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="user_id">User ID</label>
                                        <input type="text" name="<?= esc('user_id') ?>" value="<?= rand(10001, 99099) ?>" class="form-control mb-1" id="user_id" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone') ?>" class="form-control mb-1" id="phone">
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="gender">Gender</label>
                                        <select name="<?= esc('gender') ?>" class="form-control mb-1" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="image"> Profile Image
                                            <input onchange="display_image(this.files[0], event);change_image(this.files[0], event)" type="file" value="<?= old_value('image') ?>" class="form-control" name="<?= esc('image') ?>">
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">CREATE NEW USER</button>
                                        <div class="alert alert-success" id="alert" style="display: none;"></div>
                                        <a href="<?= ROOT ?>/admin/users" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'edit') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">EDIT USER</h3>
                            </div>

                            <form method="POST" action="" id="user-update" enctype="multipart/form-data">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger text-center col-lg-12">
                                        <?= implode('<br>', $errors);  ?>
                                    </div>
                                <?php endif; ?>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="<?= esc('firstname') ?>" value="<?= old_value('firstname', $row->firstname) ?>" class="form-control mb-1" id="firstname">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="surname">Surname</label>
                                        <input type="text" name="<?= esc('surname') ?>" value="<?= old_value('surname', $row->surname) ?>" class="form-control mb-1" id="surname">
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="<?= esc('username') ?>" value="<?= old_value('username', $row->username) ?>" class="form-control mb-1" id="username">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="email">email</label>
                                        <input type="email" name="<?= esc('email') ?>" value="<?= old_value('email', $row->email) ?>" class="form-control mb-1" id="email">
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="<?= esc('password') ?>" value="" class="form-control mb-1" id="password" placeholder="Leave Black to keep old password">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="user_role">User Role</label>
                                        <?php $userRoleSel = $row->user_role ?>
                                        <select name="<?= esc('user_role') ?>" id="user_role" class="form-control mb-1">
                                            <option value="Select Role">--Select User Role--</option>
                                            <option value="Admin" <?= $userRoleSel == 'Admin' ? 'selected' : '' ?>>Admin</option>
                                            <option value="Doctor" <?= $userRoleSel == 'Doctor' ? 'selected' : '' ?>>Doctor</option>
                                            <option value="Sister" <?= $userRoleSel == 'Sister' ? 'selected' : '' ?>>Sister</option>
                                            <option value="Nurse" <?= $userRoleSel == 'Nurse' ? 'selected' : '' ?>>Nurse</option>
                                            <option value="Pharmacy Clerk" <?= $userRoleSel == 'Pharmacy Clerk' ? 'selected' : '' ?>>Pharmacy Clerk</option>
                                            <option value="Claims Clerk" <?= $userRoleSel == 'Claims Clerk' ? 'selected' : '' ?>>Claims Clerk</option>
                                            <option value="Admin Clerk" <?= $userRoleSel == 'Admin Clerk' ? 'selected' : '' ?>>Admin Clerk</option>
                                            <option value="Receptionist" <?= $userRoleSel == 'Receptionist' ? 'selected' : '' ?>>Receptionist</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="user_id">User ID</label>
                                        <input type="text" name="<?= esc('user_id') ?>" value="<?= rand(10001, 99099) ?>" class="form-control mb-1" id="user_id" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="<?= esc('phone') ?>" value="<?= old_value('phone', $row->phone) ?>" class="form-control mb-1" id="phone">
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <label for="gender">Gender</label>
                                        <?php $genSelect = $row->gender ?>
                                        <select name="<?= esc('gender') ?>" class="form-control mb-1" id="gender">
                                            <option value="Male" <?= $genSelect == 'Male' ? 'selected' : ''  ?>>Male</option>
                                            <option value="Female" <?= $genSelect == 'Female' ? 'selected' : ''  ?>>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="image"> Profile Image
                                            <input onchange="display_image(this.files[0], event);change_image(this.files[0], event)" value="<?= old_value('image', $row->image) ?>" type="file" class="form-control" name="<?= esc('image') ?>">
                                        </label>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">EDIT USER</button>
                                        <a href="<?= ROOT ?>/admin/users" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>

                        <?php elseif ($action == 'delete') : ?>
                            <div class="row my-3">
                                <h3 class="text-center">DELETE USER</h3>
                            </div>
                            <form method="post">
                                <input type="hidden" name="<?= esc('csrf_token') ?>" value="<?= $_SESSION['csrf_token'] ?>">
                                <!--User Profile Image-->
                                <div class="row form-row">
                                    <div class="col-lg-12 text-center">
                                        <label>
                                            <img src="<?= ROOT . '/assets/img/user.jpeg' ?>" style="width:50px; height:50px; object-fit:cover;cursor:pointer">
                                            <input onchange="display_image(this.files[0], event)" type="file" name="<?= esc('image') ?>" class="d-none">
                                        </label>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1"><?= $row->firstname ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1"><?= $row->surname ?></div>
                                    </div>
                                </div>
                                <div class="row form-row">
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1"><?= $row->username ?></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1"><?= $row->email ?></div>
                                    </div>
                                </div>
                                <div class=" row form-row">
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1">Password Reducted</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-control mb-1"><?= $row->user_role ?></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="d-grid gap-2 col-lg-12">
                                        <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">DELETE USER</button>
                                        <a href="<?= ROOT ?>/admin/users" class="btn btn-danger">CANCEL</a>
                                    </div>
                                </div>
                            </form>
                        <?php elseif ($action == 'view') : ?>
                            <!--Display User Profile-->
                            <section class="section profile mt-5">
                                <div class="row">
                                    <?php
                                    switch ($_SESSION['userRole']) {
                                        case 'Admin':
                                        case 'Doctor':
                                        case 'Sister':
                                    ?>
                                            <div class="col-lg-6">
                                                <a class="mb-3 btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT ?>/admin/users" style="border-radius:20px"><i class="bi bi-arrow-left"></i> BACK TO USERS</a>
                                            </div>
                                    <?php break;

                                        default:
                                            # Silence is platinum
                                            break;
                                    }
                                    ?>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card">
                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                                <img src="<?= get_image($singleUser->image, 'user') ?>" alt="Profile Image" class="rounded-circle">
                                                <h2><?= $singleUser->username ?></h2>
                                                <h3>User ID: <?= $singleUser->user_id ? $singleUser->user_id : 'User ID here' ?></h3>

                                                <div class="social-links mt-2">
                                                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                                </div>
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

                                                </ul>
                                                <div class="tab-content pt-2">
                                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                                        <h5 class="card-title">Profile Details</h5>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->firstname . ' ' . $singleUser->surname ?></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Job</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->user_role ?></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Gender</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->gender ? $singleUser->gender : 'Gender here' ?></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Phone</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->phone ?></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->email ?></div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-4 label">User Since</div>
                                                            <div class="col-lg-9 col-md-8"><?= $singleUser->created ?></div>
                                                        </div>
                                                    </div>
                                                </div><!-- End Bordered Tabs -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        <?php else : ?>
                            <?php if (user('user_role') == 'Admin' || user('user_role') == 'Doctor' || user('user_role') == 'Sister') : ?>
                                <div class="row mt-3">
                                    <a href="<?= ROOT ?>/admin/users/new" class="btn btn-outline-<?= THEME_COLOR ?>">ADD NEW USER</a>
                                    <hr>
                                </div>
                            <?php endif; ?>
                            <?= Util::displayFlash('register_success', 'success') ?>
                            <?= Util::displayFlash('user_update_success', 'success') ?>
                            <?= Util::displayFlash('user_delete_success', 'success') ?>
                            <div class="row">
                                <!-- Table with stripped rows -->
                                <div class="col-lg 12 table-responsive">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Profile Image</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Surname</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">User Role</th>
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
                                                        <td> <img src="<?= get_image($row->image, 'user') ?>" width="50px" height="50px" class="rounded-circle"></td>
                                                        <td><?= $row->firstname ?></td>
                                                        <td><?= $row->surname ?></td>
                                                        <td><?= $row->username ?></td>
                                                        <td><?= $row->email ?></td>
                                                        <td><?= $row->user_role ?></td>
                                                        <td>
                                                            <div class="text-center d-flex">
                                                                <a href="<?= ROOT ?>/admin/users/view/<?= $row->id ?>"><i class="bi bi-eye-fill m-2 text-success"></i></a>
                                                                <a href="<?= ROOT ?>/admin/users/edit/<?= $row->id ?>"><i class="bi bi-pencil-square m-2 text-primary"></i></a>
                                                                <a href="<?= ROOT ?>/admin/users/delete/<?= $row->id ?>" onclick="alert('Are you sure you want to delete this user? This action cannot be reversed. Click \'OK\' to proceed OR \'JUST REFRESH THE PAGE\' to cancel the action!')"><i class="bi bi-trash m-2 text-danger "></i></a>
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