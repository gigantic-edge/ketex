<?php
session_start();
require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);


$proimg_id=$_GET['ID'];
$pro_id=$_GET['pro_id'];
$pro_name=$_GET['pro_name'];



// $profile->proimg_id = $proimg_id;

// $singleproarr = $profile->productdetails();


$profile->profile_id = $pro_id;




try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    // if ($profile->editProductimg()) {
        
     
    // } else {
    //     $addflag = false;
    // }

    var_dump($profile->Productimg());
    if($data=$profile->Productimg()){
        foreach($data AS $row)
        {
            $profile->proimg_id = $row['proimg_id'];
            $profile->image_position = '0';
            echo $profile->editProductimg();
        }
    }
    $profile->image_position = '1';
    $profile->proimg_id = $proimg_id;

    $profile->editProductimg();





    if ($addflag == true) {
        $conn->commit();

        header("Location: manage_image.php?id={$pro_id}");
    } else {
        $conn->rollBack();
        header("Location: manage_image.php?id={$pro_id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
}



