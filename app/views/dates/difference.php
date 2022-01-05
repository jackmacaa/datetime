<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <h2>result between two dates returned in <?= $data['returnformat']; ?></h2>
    <p><?= $data['difference']; ?></p>
    <a href="<?= URLROOT; ?>/dates">Back</a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
