<?php $this->view('front/inc/slf-header', $data) ?>
<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="d-flex align-items-center w-auto">
                        <img src="assets/img/<?= LOGO ?>" alt="<?= LOGO_IMG_ALT ?>">
                    </a>
                </div><!-- End Logo -->
                <?= Util::displayFlash('token_not_found_error', 'danger'); ?>
                <?= Util::displayFlash('token_expired_error', 'danger'); ?>
                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 mt-3 pb-2 bg-<?= THEME_COLOR ?>">
                            <h5 class="card-title text-center text-light pb-0 fs-4">Login to Your Account</h5>
                            <p class="text-center small text-dark">Enter your EMAIL & PASSWORD to login</p>
                        </div>
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger text-center">
                                <?= implode('<br>', $errors);  ?>
                            </div>
                        <?php endif; ?>

                        <form method="post" class="row g-3 needs-validation">

                            <div class="col-12"> 
                                <label for="email" class="form-label">Username/Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="<?= esc('email') ?>" value="<?php if(!empty($sess_email)) {echo $sess_email;} elseif(isset($_COOKIE['remember_email'])){ echo $_COOKIE['remember_email'];}  ?>" class="form-control" id="email" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                                    <input type="password" name="<?= esc('password') ?>" class="form-control" id="logPass" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input bg-<?= THEME_COLOR ?>" type="checkbox" name="<?= esc('remember') ?>" <?php if(!empty($remember)){ ?> checked <?php } elseif(isset($_COOKIE['remember'])){ ?> checked <?php } ?>>
                                        <label class="form-check-label" for="rememberMe">Remember me</label> 
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <div class="forgot-pass">
                                        <a class="text-light bg-<?= THEME_COLOR ?> p-2" href="<?= ROOT . '/login/forgot' ?>" style="border-radius: 15px;font-size:11px" ><small><em>Forgot Password? Click here, let me help you!</em></small></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-outline-<?= THEME_COLOR ?> w-100" type="submit">Login</button>
                            </div>
                            <div class="col-12">

                                <hr>
                                <div class="form-check text-center">
                                    <a class="btn btn-outline-<?= THEME_COLOR ?>" href="<?= ROOT ?>"><i class="bi bi-arrow-left"></i> <?= APP_NAME_SHORT ?> Home Page</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <?php $this->view('front/inc/slf-footer', $data) ?>