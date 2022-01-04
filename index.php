<?php

$date1 = strtotime("2019-06-01 12:00:00");
$date2 = strtotime("2021-09-21 12:00:00");

$diff = abs($date2 - $date1);

$years = floor($diff / (365*60*60*24));

$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

printf("%d years, %d months, %d days", $years, $months, $days);