<h1 class="text-<?= THEME_COLOR ?>"><span id="greeting"></span>, <?= user('firstname') ?></h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= ROOT ?>/admin">Home</a></li>
        <li class="breadcrumb-item active"><?= $page_title ?></li>
    </ol>
        <?php if ($action == 'examine') : ?>
            <a href="<?= ROOT ?>/admin/patients/view/<?= $id ?>" class="btn btn-<?= THEME_COLOR ?> btn-sm">Back to Patient Details</a>
        <?php endif; ?>
</nav>