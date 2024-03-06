<?php $this->view('front/inc/slf-header', $data) ?>

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="<?= ROOT ?>" class="d-flex align-items-center w-auto">
                        <img src="<?= ROOT ?>/assets/img/<?= LOGO ?>" alt="<?= LOGO_IMG_ALT ?>">
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3"> 

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <p class="card-title text-center pb-0 fs-4" style="font-family: 'Times New Roman', Times, serif;"><em>Kindly provide the valid email you used to register as a user, below</em></p>
                        </div>
                        <hr>
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger text-center">
                                <?= implode('<br>', $errors);  ?>
                            </div>
                        <?php endif; ?>
                        <?= Util::displayFlash('reset_msg_success','success') ?>
                        <?= Util::displayFlash('reset_msg_error','success') ?>
                        <form method="POST" class="row g-3 needs-validation">
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope-check"></i></span>
                                    <input type="text" name="<?= esc('email') ?>" class="form-control" id="email" required>
                                </div>
                            </div>
                            <input type="hidden" name="<?= esc('reset_token_hash') ?>" value="<?= $token ?>">

                            <div class="col-12">
                                <button class="btn btn-<?= THEME_COLOR ?> w-100" type="submit">SEND RESET LINK</button>
                            </div>
                            <div class="col-12">
                                <a href="<?= ROOT . '/login' ?>" class="btn btn-danger w-100" type="submit">Cancel</a>
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