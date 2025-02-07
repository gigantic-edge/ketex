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

$noticedetails = $profile->allnoticedetails();
// $whoweare=$profile->whoweare();
// $awords = $profile->allawordsdetails();
// $department = $profile->allDepartmentlist();
// $emp_details = $profile->employee_dep_details();



// print_r($management);
// exit();


// $deptvaluearr = $profile->allDeptvalues();

// include '/index.php';
// include '../assets/inc/header.php';


// require_once("includes/footerInc.php");
?>