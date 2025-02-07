<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

//print_r($_SESSION['userid']);exit;
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'ketex_admin/index.php');
}

require_once("includes/header_top.php");

require_once("includes/headerInc.php");


require_once("class/profile.php");

$profile = new profile($conn);
 
  $app_details = $profile->application_details();
 

include 'html/application_details.php';

require_once("includes/footerInc.php");
?>

