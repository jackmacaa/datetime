<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">

    <h1><?php echo $data['title']; ?></h1>
    <p>Difference between two dates</p>

    <div class="card card-body bg-light mt-5">
        <form action="<?php echo URLROOT; ?>/dates/days" method="post">

            <div class="form-group">
                <label >Will get result in number of days between the dates</label>
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

    <div class="card card-body bg-light mt-5">
        <form action="<?php echo URLROOT; ?>/dates/weeks" method="post">

            <div class="form-group">
                <label >Will get result in number of weeks between the dates</label>
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

    <?php
/*    $date1 = strtotime("2019-06-01 12:00:00");
    $date2 = strtotime("2021-09-21 12:00:00");

    $diff = abs($date2 - $date1);

    $years = floor($diff / (365 * 60 * 60 * 24));

    $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));

    $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

    printf("%d years, %d months, %d days", $years, $months, $days);*/
    ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
