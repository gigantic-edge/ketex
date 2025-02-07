<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/profile.php");

//echo '<pre>';

$profile = new profile($conn);

$id = $_POST['id'];
$pro_name = $_POST['pro_name'];

$image_position = $_POST['image_position'];


$fileCount  = count($_FILES['product_img']['name']);

for($i = 0; $i < $fileCount ; $i++)
{


    $original_nm_photo = $_FILES['product_img']['name'][$i];
    // print_r($original_nm_photo);
    
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

    $document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

    $extension = explode(".", $original_nm_photo);

    $exts = end($extension);

    $move_status = false;

    $default_logo = '';

    $newname = $i . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['product_img']['tmp_name'][$i], $destination);
    
    $pro_images = $newname;
    
    
    

    $profile->proimg_id = '';
    $profile->id = $id;
    $profile->product_img = $pro_images;
    $profile->image_position = $image_position;

    $profile->addProductimage();


}

// exit();

// $pro_images = $move_status == TRUE ? $pro_images : $default_logo;




// $profile->proimg_id = '';
// $profile->pro_id = $pro_id;
// $profile->product_img = $pro_images;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    // if ($profile->addProductimage() == true) {

        
    // } else {
    //     $addflag = false;
    // }

//exit;
    if ($addflag == true) {
        $conn->commit();

        // $_SESSION['succ_profile_add'] = 'Product Image added successfully.';
        header("Location: addProduct_image.php?id={$id}&pro_name={$pro_name}");
    } else {
        $conn->rollBack();
        // $_SESSION['fail_profile_add'] = 'Error to Product Image.';
        header('Location: addProduct_image.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: addProduct_image.php');
}