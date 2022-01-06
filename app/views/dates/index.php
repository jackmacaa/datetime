<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <h1>Difference between two dates</h1>
    <a href="<?= URLROOT; ?>">Home</a>

    <div class="card card-body bg-light mt-1">
        <form action="<?php echo URLROOT; ?>/dates/difference" method="post">

            <div class="form-group">
                <label for="returnformat">Return format: (days, weeks or years) <sup>*</sup></label>
                <input type="text" name="returnformat" class="form-control form-control-lg <?=(!empty($data['returnformat_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['returnformat']; ?>" placeholder="days">
                <span class="invalid-feedback"><?= $data['returnformat_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="startdate">Start Date: <sup>*</sup></label>
                <input type="text" name="startdate" class="form-control form-control-lg <?=(!empty($data['startdate_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['startdate']; ?>" placeholder="2022-01-01 12:00:00">
                <span class="invalid-feedback"><?= $data['startdate_err']; ?></span>
            </div>

            <div class="form-group">
                <label for="enddate">End Date: <sup>*</sup></label>
                <input type="text" name="enddate" class="form-control form-control-lg <?=(!empty($data['enddate_err'])) ? 'is-invalid' : '' ?>" value="<?= $data['enddate']; ?>">
                <span class="invalid-feedback"><?= $data['enddate_err']; ?></span>
            </div>

            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
    <div class="card card-body bg-light mt-5">
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

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>