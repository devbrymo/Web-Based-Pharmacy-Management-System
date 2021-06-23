<?php


$date_array = getdate();
$time_array = getdate();
$formated_date = $date_array["mday"] . "-";
$formated_date .= $date_array["month"] . "-";
$formated_date .= $date_array["year"];
$date=$formated_date;

$formated_date2 = $date_array["year"] . "-";
$formated_date2 .= $date_array["mon"] . "-";
$formated_date2 .= $date_array["mday"];
$date2=$formated_date2;

$formated_time =$time_array["hours"]. ":";
$formated_time .=$time_array["minutes"];
$formated_time .=" " .date("A", time());
$time=$formated_time;


?>