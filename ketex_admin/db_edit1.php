<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);

//echo '<pre>';

$id = $_POST['profile_id'];
$pro_name = $_POST['pro_name'];
$pro_description = $_POST['pro_description'];
$career_highlights = $_POST['career_highlights'];
$update_at = date("Y/m/d");


// $update_at = date('Y-m-d H:i:s');



$profile->profile_id = $id;
$singleproarr1 = $profile->singleprofile1();



$profile->pro_name = $pro_name;
$profile->pro_description = $pro_description;
$profile->description = $career_highlights;
$profile->update_at = $update_at;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editProfile1() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Update is successfully';
        header("Location: product_details.php?id={$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit Product details.';
        header("Location: product_details.php?id={$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: product_details.php');
}