<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");

$profile = new profile($conn);

$profileid = $_GET['id'];

$profile->id = $profileid;
$deleteproarr = $profile->deleteprofile();
//$profile->id = $profileid;
//$deleteproarr = $profile->deleteprofileDetails();

header('Location: ' . $database->base_url . 'admin/profile.php');
