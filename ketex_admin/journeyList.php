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

require_once("class/branches.php");

$branches = new branches($conn);

$branchesArr = $branches->allJourneylist();

include 'html/journeyListInc.php';

require_once("includes/footerInc.php");
?>

