<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="container">

        <h1>Difference between two dates</h1>
        <a href="<?= URLROOT; ?>/dates">Back</a>

        <div class="card card-body bg-light mt-1 mb-3">
            <form action="<?php echo URLROOT; ?>/dates/edit/<?= $data['id']; ?>" method="post">

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

<?php require APPROOT . '/views/inc/footer.php'; ?>