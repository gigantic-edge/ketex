<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/profile.php");
//echo '<pre>';

$profile = new profile($conn);

// print_r($_POST);
// exit();


$dep_id = $_POST['dep_id'];
$employee_name = $_POST['employee_name'];
$employee_designation = $_POST['employee_designation'];
$created_add= date("Y/m/d");

// image 

$original_nm_photo = $_FILES['image']['name'];

$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".", $original_nm_photo);

$exts = end($extension);

$move_status = false;

$default_logo = '';

if (($_FILES['image']) && in_array($exts, $allowedexts)) {

    $newname = $employee_name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;



$profile->dep_id = $dep_id;
$profile->page_image = $page_image;
$profile->employee_name = $employee_name;
$profile->employee_designation = $employee_designation;
$profile->create_add = $created_add;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addEmployee() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Employee is added successfully.';
        header('Location: employee_department_details.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error ';
        header('Location: employee_department_details.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: employee_department_details.php');
}