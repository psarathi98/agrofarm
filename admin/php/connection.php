<?php

$databaseHost = 'localhost';
$databaseName = 'u161634348_adminrecord';
$databaseUsername = 'u161634348_agrofarm';
$databasePassword = 'abAgro_farm@11';

// Open a new connection to the MySQL server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

/* Override the server timezone and set it to ASIA/KOLKATA BELOW ARE SOME DEBUGGING RELATED CODES FOR THAT
$script_tz = date_default_timezone_get();
echo $script_tz;
date_default_timezone_set('Asia/Kolkata');
$script_tz = date_default_timezone_get();
echo $script_tz;
$t=time();
echo($t . "<br>");
echo(date("Y-m-d",$t));

$d=strtotime($t);
echo date("h:i:sa d-m-Y",$t);


if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}

$date = date("Y-m-d H:i:s");
echo $date;*/

date_default_timezone_set('Asia/Kolkata');

?>
