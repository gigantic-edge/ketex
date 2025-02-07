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

$management = $profile->companyprofile();
$whoweare=$profile->whoweare();
$awords = $profile->allawordsdetails();
$clients = $profile->allclientsdetails();


$emp_details = $profile->employee_dep_details1();
$department = $profile->getTeamsHtml($emp_details);
$noticedetails = $profile->allnoticedetails();
$productlist = $profile->allproductlist();
$application = $profile->application_details();

$journeyList = $profile->allJourneyList();

// foreach($emp_details AS $department => $employee)
// {
// 	echo "<br>{$department} --------";
// 	if(!empty($employee))
// 	{
// 		foreach($employee AS $person)
// 		{
// 			echo "<br>Name: {$person['employee_name']}";
// 		}
// 	}
// }
// print "<pre>";
//  print_r($emp_details);
//  exit();


// $deptvaluearr = $profile->allDeptvalues();

// include '/index.php';
// include '../assets/inc/header.php';


// require_once("includes/footerInc.php");
?>