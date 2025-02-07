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


require_once("class/profile.php");


$profile = new profile($conn);

$profilearr = $profile->allCareerlist();
//print_r($profilearr); 
//$deptvaluearr = $profile->allDeptvalues();

include 'html/careerInc.php';


require_once("includes/footerInc.php");
?>

