<?php
require_once("db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("ketex_admin/class/profile.php");

$profile = new profile($conn);

@$profileid = $_GET['id'];

$profile->profilelistid = $profileid;

$applicationlist = $profile->applicationlist();

// print "<pre>";
//  print_r($applicationlist);
//  exit();

$application = $profile->getProductsHtml($applicationlist);


include 'html/applicationListInc.php';
?>
