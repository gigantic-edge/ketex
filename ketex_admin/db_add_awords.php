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



$description = $_POST['description'];
$year = $_POST['year'];

// image

$original_nm_photo = $_FILES['image']['name'];

$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".", $original_nm_photo);

$exts = end($extension);

$move_status = false;

$default_logo = '';

if (($_FILES['image']) && in_array($exts, $allowedexts)) {

    $newname = awords . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;


$profile->page_image = $page_image;
$profile->description = $description;
$profile->year = $year;


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addAwords() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Page is added successfully.';
        header('Location: awords_a.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add Page.';
        header('Location: awords_a.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: awords_a.php');
}