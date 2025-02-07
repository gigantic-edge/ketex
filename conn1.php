<?php
$serverNew = "localhost";
$usernameNew = "root";
$passwordNew = "";
$databaseNew = "ketexcom_ketex_new";
 
$dsn = 'mysql:dbname=' . $databaseNew . ';host=' . $serverNew;

$connNew = new PDO($dsn, $usernameNew, $passwordNew);
?>