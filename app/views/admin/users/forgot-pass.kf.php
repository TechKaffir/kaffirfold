<?php $this->view('front/inc/slf-header', $data) ?>

<div class="card mb-3">

    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4">Reset your Password below</h5>
        </div>

        <form method="post" class="row g-3 needs-validation">
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger text-center">
                    <?= implode('<br>', $errors);  ?>
                </div>
            <?php endif; ?>
            <input type="hidden" name="<?= esc('token') ?>" value="<?= esc($token) ?>">
            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="col-12">
                <label for="password" class="form-label">New Password</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                    <input type="password" name="<?= esc('password') ?>" class="form-control" id="forgotPass">
                </div>
            </div>
            <div class="col-12">
                <label for="rp_password" class="form-label">Repeat Password</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-shield-lock"></i></span>
                    <input type="password" name="<?= esc('rp_password') ?>" class="form-control" id="rpPass">
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-<?= THEME_COLOR ?> w-100" type="submit">Reset Password</button>
            </div>
            <?php show($errors) ?>
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

<!-- ======= Footer ======= -->
<?php $this->view('admin/inc/admin-footer') ?>