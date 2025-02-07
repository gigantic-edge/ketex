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

//echo 'hiiii';
//
 $profile = new profile($conn);

 $category_emp = $profile->category_emp();


// $attribute2arr = $profile->allattribute2();


include 'html/add_employee_detailsInc.php';


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
       
        CKEDITOR.replace('career_highlights');
        CKEDITOR.replace('certifications');
        CKEDITOR.replace('achievements');
    };
</script>
