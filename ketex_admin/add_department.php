<?php
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'ketex_admin/index.php');
}

require_once("includes/header_top.php");
require_once("includes/headerInc.php");

require_once("class/profile.php");


include 'html/add_departmentInc.php';


require_once("includes/footerInc.php");
?>
