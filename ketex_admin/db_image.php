<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);


$id = $_POST['profile_id'];

$update_add = date("Y/m/d");




$original_nm_photo = $_FILES['image']['name'];

$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".",$original_nm_photo);

$exts = end($extension);

$move_status = false;

$default_logo = '';

if (($_FILES['image']) && in_array($exts, $allowedexts)) {

    $newname = $id . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    $employee_image = $newname;
}
$employee_image = $move_status == TRUE ? $employee_image : $default_logo;

$profile->profile_id = $id;
$profile->employee_image = $employee_image;
$profile->update_add = $update_add;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editImage2() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Image update is successfully';
        header("Location: edit_image.php?id={$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error';
        header("Location: edit_image.php?id={$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location:edit_image.php');
}