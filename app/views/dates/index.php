<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <h1><?php echo $data['title']; ?></h1>
    <p>Difference between two dates</p>

    <div class="card card-body bg-light mt-5">
        <form action="<?php echo URLROOT; ?>/dates/difference" method="post">

            <div class="form-group">
                <label for="returnformat">Return format: (days, weeks or years) default is days</label>
                <input type="text" name="returnformat" class="form-control form-control-lg" placeholder="days">
            </div>

            <div class="form-group">
                <label for="startdate">Start Date: <sup>*</sup></label>
                <input type="text" name="startdate" class="form-control form-control-lg" placeholder="2019-06-01 12:00:00">
            </div>

            <div class="form-group">
                <label for="enddate">End Date: <sup>*</sup></label>
                <input type="text" name="enddate" class="form-control form-control-lg" >
            </div>

            <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>