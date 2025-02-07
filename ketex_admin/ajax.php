<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'admin/index.php');
}


require_once("class/profile.php");


$profile = new profile($conn);

$profileid =$_POST['id'];
$profilestatus =$_POST['status'];

$profile->profile_id = $profileid;
$profile->status = $profilestatus;
$profilearr = $profile->profileStatus();


?>

