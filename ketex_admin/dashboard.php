<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['userid'])) {
    header('Location:' . $database->base_url . 'ketex_admin/index.php');
}
require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("includes/header_top.php");
require_once("includes/headerInc.php");
require_once("class/profile.php");

$profile = new profile($conn);

include 'html/databoardInc.php';

require_once("includes/footerInc.php");
?>
