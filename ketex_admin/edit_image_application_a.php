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
//echo '<pre>';

$profile = new profile($conn);

$profileid = $_GET['id'];

$profile->profile_id = $profileid;

$application = $profile->singleapplication_details();

include 'html/edit_image_application.php';

require_once("includes/footerInc.php");

?>

