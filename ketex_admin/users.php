<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'admin/index.php');
}

require_once("includes/header_top.php");
require_once("includes/headerInc.php");
require_once("class/users.php");


$users = new users($conn);

$usersarr = $users->listUsers();

include 'html/usersInc.php';


require_once("includes/footerInc.php");
?>

