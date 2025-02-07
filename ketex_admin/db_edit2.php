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
$update_at = date("Y/m/d");


// $update_at = date('Y-m-d H:i:s');

$original_nm_photo = $_FILES['image']['name'];
//print_r($original_nm_photo);
$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;
//print_r($document_path);
$extension = explode(".", $original_nm_photo);
//print_r($extension);
$exts = end($extension);
$move_status = false;

$profile->profile_id = $id;
$singleproarr = $profile->singleprofile();

$default_logo = $singleproarr['image'];
if (($_FILES['image']) && in_array($exts, $allowedexts)) {
    $newname = $pro_name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;





$profile->profile_id = $id;
$singleproarr1 = $profile->singleprofile1();
$profile->image = $page_image;
$profile->update_at = $update_at;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editPic() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Product image update is successfully';
        header('Location: product_details.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit Product image.';
        header('Location: product_details.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: product_details.php');
}