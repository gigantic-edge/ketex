<?php
$server = "localhost";
$username = "ketexcom_ketex_new";
$password = "t;(ZhdY.?QXw";
$database = "ketexcom_ketex_new";
 
$dsn = 'mysql:dbname=' . $database . ';host=' . $server;

$conn = new PDO($dsn, $username, $password);
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
?>