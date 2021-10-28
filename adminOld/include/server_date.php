<?php
//get curent server date and time
date_default_timezone_set("Asia/Kolkata");
$info = getdate();
$day = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$second = $info['seconds'];
$server_date = "$year-$month-$day";
$server_time = "$hour:$min:$second";
$time_in_24_hour_format  = DATE("H:i:s", STRTOTIME("$server_time"));
//end date 
?>