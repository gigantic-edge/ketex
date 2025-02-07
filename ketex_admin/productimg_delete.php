<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);

//echo '<pre>';

// $proimg_id = $_POST['proimg_id'];
$id = $_GET['id'];


$profile->profile_id = $id;
$singleproarr1 = $profile->productdetails();



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->productimgdelete() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Product Image delete is successfully';
        header('Location: product_details.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit Product Image.';
        header('Location: product_details.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: product_details.php');
}