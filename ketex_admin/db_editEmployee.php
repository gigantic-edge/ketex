<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");

$profile = new profile($conn);



$id = $_POST['profile_id'];
$employee_name = $_POST['employee_name'];
$emp_designation = $_POST['emp_designation'];
$update_add = date("Y/m/d");



$profile->profile_id = $id;
$singleprofile2 = $profile->singleprofile2();



$profile->employee_name = $employee_name;
$profile->emp_designation = $emp_designation;
$profile->update_add = $update_add;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editEmployee() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Update is successfully';
        header("Location: editEmployee_details.php?id={$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit Product details.';
        header("Location: editEmployee_details.php?id={$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: editEmployee_details.php');
}