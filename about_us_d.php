<?php
// session_start();
require_once("db/config.php");
$database = new Database();
$conn = $database->connect();
// if (!isset($_SESSION['userid'])) {
//     header('Location: ' . $database->base_url . 'admin/index.php');
// }
// require_once("includes/header_top.php");
// require_once("includes/headerInc.php");
require_once("ketex_admin/class/profile.php");
//echo '<pre>';


$profile = new profile($conn);

$aboutus = $profile->aboutus();
$vision=$profile->vision();
$mission = $profile->mission();
$director = $profile->director();
$emp_details = $profile->employee_dep_details();

$journeyList = $profile->allJourneyListDesc();


// print_r($management);
// exit();


// $deptvaluearr = $profile->allDeptvalues();

// include '/index.php';
// include '../assets/inc/header.php';


// require_once("includes/footerInc.php");
?>