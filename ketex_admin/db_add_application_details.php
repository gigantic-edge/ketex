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


$cat_id = $_POST['cat_id'];
$app_name = $_POST['app_name'];
$app_description = $_POST['app_description'];
$created_at= date("Y/m/d h/m/s");

// image 

$original_nm_photo = $_FILES['image']['name'];

$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".", $original_nm_photo);

$exts = end($extension);

$move_status = false;

$default_logo = '';

if (($_FILES['image']) && in_array($exts, $allowedexts)) {

    $newname = application . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;



$profile->cat_id = $cat_id;
$profile->page_image = $page_image;
$profile->app_name = $app_name;
$profile->app_description = $app_description;
$profile->created_at = $created_at;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addApplication_details() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Employee is added successfully.';
        header('Location: application_details_a.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error ';
        header('Location: application_details_a.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: application_details_a.php');
}