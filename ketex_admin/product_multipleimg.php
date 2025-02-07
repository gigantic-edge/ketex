<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

//print_r($_SESSION['userid']);exit;
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'admin/index.php');
}

require_once("includes/header_top.php");

require_once("includes/headerInc.php");


require_once("class/profile.php");
$profile = new profile($conn);

  $product_imgdetail = $profile->product_imgdetails();

 //print_r($product_details); exit;


include 'html/product_multipleimgInc.php';

require_once("includes/footerInc.php");
?>

