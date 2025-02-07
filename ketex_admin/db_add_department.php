<?php


session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/profile.php");


$profile = new profile($conn);

$department_name = $_POST['department_name'];

$create_add=date("Y/m/d");




$profile->department_name = $department_name;
$profile->create_add = $create_add;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addDepartment() == true) {

        
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Department added successfully.';
        header('Location: employee_details.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error';
        header('Location: employee_details.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: employee_details.php');
}