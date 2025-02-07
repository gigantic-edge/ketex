<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "ketexcom_ketex_new";
 
$dsn = 'mysql:dbname=' . $database . ';host=' . $server;

$conn = new PDO($dsn, $username, $password);
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
?>