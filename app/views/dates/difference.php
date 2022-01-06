<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <h1>Difference</h1>
    <a href="<?= URLROOT; ?>/dates">Back</a>
    <div class="card card-body bg-light mt-5">
        <h3><strong><?= $data[0]; ?></strong>
            <?php if($data['returnformat'] == 'days' || $data['returnformat'] == 'weeks' || $data['returnformat'] == 'years' || $data['returnformat'] == 'weekdays') : ?>
                <?= $data['returnformat']; ?>
            <?php else: ?>
                <?= 'Default : Days' ?>
            <?php endif; ?> </h3>
    </div>

    <div class="card card-body bg-light mt-5">
    <?php
        echo json_encode($data);
    ?>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
