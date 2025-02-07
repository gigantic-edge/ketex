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

$umid = $_GET['umid'];

$users->um_id = $umid;
$singleuserarr = $users->singleUser();


include 'html/editUserInc.php';


require_once("includes/footerInc.php");
?>

