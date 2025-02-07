<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'admin/index.php');
}
$base_url = $database->base_url;
$document_path_product = $database->document_path_product;

$quotationid = $_GET['qmid'];

require_once("includes/header_top.php");
require_once("includes/headerInc.php");
require_once("class/order.php");


$order = new order($conn);

$order->qd_qm_id = $quotationid;

$quotationschemearr = $order->quotationscheme();

$quotationDetailsarr = $order->quotationDetails();

include 'html/editSchemeDetailsIns.php';


require_once("includes/footerInc.php");
?>
