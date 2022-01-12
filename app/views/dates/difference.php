<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container">
    <?php flash('post_message'); ?>
    <h1>Difference</h1>
    <a href="<?= URLROOT; ?>/dates">Back</a>
    <div class="card card-body bg-light mt-5">
        <h4>Start date timezone: <?= $data['startdate-timezone']; ?></h4>
        <h4>End date timezone: <?= $data['enddate-timezone']; ?></h4>
        <h3><strong><?= $data[0]; ?></strong>
            <?php if(in_array($data['returnformat'], ['days', 'weeks', 'years', 'weekdays'])) : ?>
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
