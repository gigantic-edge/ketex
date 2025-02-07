<?php
require_once("db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("ketex_admin/class/profile.php");

$profile = new profile($conn);

$profileid = $_GET['id'];
// $profileimg = $_GET['id'];

// $profile->profilelistid = $profileid;
$profile->proid = $profileid;

$productlistarr = $profile->productdetail();
$productimagearr = $profile->productimage();


include 'html/product_detailsInc.php';
?>
