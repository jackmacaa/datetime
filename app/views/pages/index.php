<?php require APPROOT . '/views/inc/header.php'; ?>

    <div class="container">
        <h1>DateTime APP HOME</h1>
        <a href="<?= URLROOT; ?>/dates">Difference between two dates</a>
        <div class="card card-body bg-light mt-1">
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
        <div class="card card-body bg-light mt-3">
            <a href="https://www.php.net/manual/en/timezones.php" target="_blank" ><h2>Accepted timezone formats</h2></a>
            <ul>
                <li>Country/City</li>
                <li>Australia/Adelaide</li>
                <li>US/Hawaii</li>
                <li>America/Los_Angeles</li>
            </ul>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
