<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);

//echo '<pre>';

$id = $_POST['profile_id'];

$update_at = date("Y/m/d");

$profile->profile_id = $id;
$singleproarr = $profile->singleprofile();



$original_nm_photo = $_FILES['pdf']['name'];
//print_r($original_nm_photo);
$allowedexts = array("pdf");
// $document_path = $database->base_url . $database->document_path_site_image;
$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

// print_r($document_path);

// exit();
$extension = explode(".", $original_nm_photo);
//print_r($extension);
$exts = end($extension);
$move_status = false;
$default_logo = '';
if (($_FILES['pdf']) && in_array($exts, $allowedexts)) {
    $newname = $id . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    //  print_r($destination);

    // exit();

    $move_status = move_uploaded_file($_FILES['pdf']['tmp_name'], $destination);
    $page_pdf = $newname;
}
$page_pdf = $move_status == TRUE ? $page_pdf : $default_logo;


$profile->pdf = $page_pdf;
$profile->update_at = $update_at;


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editpdf() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Product pdf update is successfully';
        header("Location: edit_pdf.php?id{$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to Product pdf.';
        header("Location: edit_pdf.php?id{$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: product_details.php');
}