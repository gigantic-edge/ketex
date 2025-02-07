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
$cat_name = $_POST['cat_name'];
$update_at = date('Y-m-d H:i:s');

$profile->profile_id = $id;
$singleproarr = $profile->singleprofile();

$profile->cat_name = $cat_name;

$profile->update_at = $update_at;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editProfile() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Category update is successfully';
        header("Location: Profile.php?id={$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit profile.';
        header("Location: Profile.php?id={$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: profile.php');
}