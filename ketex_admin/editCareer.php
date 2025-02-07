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

$id = $_GET['id'];
//print_r($id);
// $attribute1valuearr = $profile->allattribute1();

// $attribute2valuearr = $profile->allattribute2();
//print_r($id); exit;
$profile->id = $id;

$singleproarr = $profile->singlecareer();

//$attribute1arr = $profile->singlattribute1();
//print_r($singleproarr);

// if (!empty($singlattribute1arr)) {
//     $cntattribute1tag = count($singlattribute1arr);
// }

// if ($singleproarr['batch'] == "4") {
//        $showsearch3 = "MBA04";
//    } else {
//        $showsearch3 = "MBA05";
//    }

//$profile->profile_id = $profileid;

//$attribute2arr = $profile->singlattribute2();

// if (!empty($attribute2arr)) {
//     $cntattribute2tag = count($attribute2arr);
// }
//exit;
include 'html/editCareerInc.php';


require_once("includes/footerInc.php");
?>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript">
    function ShowContainer(container_name) {
        document.getElementById(container_name).style.display = 'block';
    }
    function HideContainer(container_name) {
        document.getElementById(container_name).style.display = 'none';
    }
    window.onload = function () {
       CKEDITOR.replace('body');
        CKEDITOR.replace('achievements');
        CKEDITOR.replace('certifications');
    };
</script>

