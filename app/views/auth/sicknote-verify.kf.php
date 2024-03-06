<?php $this->view('front/inc/slf-header', $data) ?>
<div class="row my-3">
    <div class="col-lg-12 text-center">
        <img src="<?= ROOT . '/assets/img/' . LOGO ?>" alt="<?= LOGO_IMG_ALT ?>">
    </div>
    <hr>
    <h3 class="text-center">SICK CERTIFICATE VERIFICATION <br> <span style="font-size: 14px;">Please provide the details required hereunder, as stated on the relevant sick certificate.</span></h3>
</div>
<div class="row">
    <?= Util::displayFlash('sicknote_verify_success', 'success') ?>
    <?= Util::displayFlash('sicknote_verify_error', 'danger') ?>
</div>
<form method="POST" action="">
    <div class="row form-row">
        <div class="col-lg-12">
            <label for="Surname">Surname</label>
            <input type="text" name="<?= esc('Surname') ?>" value="<?= old_value('Surname') ?>" class="form-control mb-1" id="Surname">
        </div>
        <div class="col-lg-12">
            <label for="First_Name">First Name</label>
            <input type="text" name="<?= esc('First_Name') ?>" value="<?= old_value('First_Name') ?>" class="form-control mb-1" id="First_Name">
        </div>
        <div class="col-lg-12">
            <label for="cons_date">Consultation Date</label>
            <input type="date" name="<?= esc('cons_date') ?>" value="<?= old_value('cons_date') ?>" class="form-control mb-1" id="cons_date">
        </div>
    </div>
    <hr class="my-3">
    <div class="form-row">
        <div class="d-grid gap-2 col-lg-12">
            <button type="submit" class="btn btn-outline-<?= THEME_COLOR ?>">VERIFY SICK NOTE</button>
            <a href="<?= ROOT ?>" class="btn btn-danger">CANCEL</a>
        </div>
    </div>

</form>

<div class="text-center mt-3">
    <?php $this->view('front/inc/slf-footer', $data) ?>
</div>