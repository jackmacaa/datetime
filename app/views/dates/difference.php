<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <h2>result between two dates returned in
        <?php if($data['returnformat'] != '') : ?>
            <?= $data['returnformat']; ?>
        <?php else: ?>
            <?= 'Days' ?>
        <?php endif; ?>
    </h2>
    <p><?= $data['difference']; ?></p>
    <a href="<?= URLROOT; ?>/dates">Back</a>

    <?php
        echo json_encode($data);
    ?>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
