<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <h1>Difference between two dates</h1>
    <a href="<?= URLROOT; ?>">Home</a>

    <div class="card card-body bg-light mt-1 mb-3">
        <form action="<?php echo URLROOT; ?>/dates/difference" method="post">

            <div class="form-group">
                <label for="returnformat">Return format: (days, weekdays, weeks or years) <sup>*</sup></label>
                <input type="text" name="returnformat" class="form-control form-control-lg <?=(!empty($data['returnformat_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['returnformat']; ?>" placeholder="days">
                <span class="invalid-feedback"><?= $data['returnformat_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="startdate-timezone">Start date timezone: (default is Australia/Adelaide)</label>
                <input type="text" name="startdate-timezone" class="form-control form-control-lg" value="<?= $data['startdate-timezone']; ?>" placeholder="Europe/Bucharest">
            </div>

            <div class="form-group">
                <label for="startdate">Start Date: <sup>*</sup></label>
                <input type="text" name="startdate" class="form-control form-control-lg <?=(!empty($data['startdate_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['startdate']; ?>" placeholder="2022-01-01 12:00:00">
                <span class="invalid-feedback"><?= $data['startdate_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="enddate-timezone">End date timezone: </label>
                <input type="text" name="enddate-timezone" class="form-control form-control-lg" value="<?= $data['enddate-timezone']; ?>">
            </div>

            <div class="form-group">
                <label for="enddate">End date: <sup>*</sup></label>
                <input type="text" name="enddate" class="form-control form-control-lg <?=(!empty($data['enddate_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['enddate']; ?>">
                <span class="invalid-feedback"><?= $data['enddate_err']; ?></span>
            </div>

            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title">Previous date differences: # <?= $post->postId ?></h4>
            <div class="bg-light p-2 mb-3">
                Start date timezone: <?= $post->start_date_timezone; ?><br>
                Start date: <?= $post->start_date; ?><br>
                End date timezone: <?= $post->end_date_timezone; ?><br>
                End date: <?= $post->end_date; ?><br>
                Result in <?= $post->return_format; ?>: <strong><?= $post->result; ?></strong>
            </div>
            <p class="card-text">created on: <?= $post->postCreated; ?> By user: <?= $post->name?></p>

            <?php if($post->id == $_SESSION['user_id']) : ?>
                <a href="<?= URLROOT; ?>/dates/edit/<?= $post->postId; ?>" class="btn btn-dark mb-1">Edit</a>
                <form action="<?= URLROOT; ?>/dates/delete/<?= $post->postId; ?>" class="pull-right" method="post">
                    <input type="submit" value="delete" class="btn btn-danger center">
                </form>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <div class="card card-body bg-light mt-2">
        <h2>Accepted date formats</h2>
        <ul>
            <li>YYYY-MM-DD HH:MM:SS e.g. 2022-01-01 12:00:00</li>
            <li>YYYY-MM-DD</li>
            <li>10 September 2000</li>
            <li>+1 day</li>
            <li>+1 week</li>
            <li>+1 week 2 days 4 hours 2 seconds</li>
            <li>next Thursday</li>
            <li>last Monday</li>
            <li>now</li>
        </ul>
    </div>
    <div class="card card-body bg-light mt-2">
        <a href="https://www.php.net/manual/en/timezones.php" target="_blank" ><h2>Accepted timezone formats</h2></a>
        <ul>
            <li>e.g. Country/City</li>
            <li>Australia/Adelaide</li>
            <li>US/Hawaii</li>
            <li>America/Los_Angeles</li>
        </ul>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>