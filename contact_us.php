<?php
require_once("db/config.php");
$database = new Database();
$conn = $database->connect();


require_once("ketex_admin/class/profile.php");

$profile = new profile($conn);

@$profileid = $_GET['ID'];

$profile->profilelistid = $profileid;

$branchesListArr = $profile->allBranchlist();

//$branchesListArr = $branches->allBranchlist();


include 'html/contactUsInc.php';
?>
