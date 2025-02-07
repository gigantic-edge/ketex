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
$pro_name = $_POST['pro_name'];
$product_pdf_title = $_POST['product_pdf_title'];
$pro_description = $_POST['pro_description'];
$description = $_POST['career_highlights'];
$created_at= date("Y/m/d");

// print_r($_FILES);
// exit();

$original_nm_photo = $_FILES['image']['name'];
//print_r($original_nm_photo);
$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
// $document_path = $database->base_url . $database->document_path_site_image;
$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

// print_r($document_path);

// exit();
$extension = explode(".", $original_nm_photo);
//print_r($extension);
$exts = end($extension);
$move_status = false;
$default_logo = '';
if (($_FILES['image']) && in_array($exts, $allowedexts)) {
    $newname = $pro_name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    //  print_r($destination);

    // exit();

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;

// print_r($page_image);
// exit();




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
    $newname = $pro_name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    //  print_r($destination);

    // exit();

    $move_status = move_uploaded_file($_FILES['pdf']['tmp_name'], $destination);
    $page_pdf = $newname;
}
$page_pdf = $move_status == TRUE ? $page_pdf : $default_logo;


$profile->pro_id = '';
$profile->cat_id = $cat_id;
$profile->image = $page_image;
$profile->product_pdf_title = $product_pdf_title;
$profile->page_pdf = $page_pdf;
$profile->pro_name = $pro_name;
$profile->pro_description = $pro_description;
$profile->description = $description;
$profile->created_at = $created_at;







try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addProduct() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Product is added successfully.';
        header('Location: product_details.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add Product.';
        header('Location: product_details.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: product_details.php');
}