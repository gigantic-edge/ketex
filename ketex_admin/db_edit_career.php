<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");
$profile = new profile($conn);

//echo '<pre>';

$id = $_POST['id'];
//$name = $_POST['name'];
//$emp_img = $_POST['emp_img'];
$body = $_POST['body'];
$update = date('Y-m-d H:i:s');

//print_r($body); exit;
//$original_nm_photo = $_FILES['image']['name'];
//print_r($original_nm_photo);
// $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
// $document_path = realpath(__DIR__ . '/..') . $database->document_path_site_image;
//print_r($document_path);
//$extension = explode(".", $original_nm_photo);
//print_r($extension);
//$exts = end($extension);
//$move_status = false;
$profile->body = $body;
$profile->id = $id;
$singleproarr = $profile->editCareer(); 
//print_r($singleproarr);
//$default_logo = $singleproarr['image'];
// if (($_FILES['image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
//     $newname = $name . date('d-m-y') . "_" . time() . "." . $exts;

//     $destination = $document_path . $newname;

//     $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
//     $page_image = $newname;
// }
//$page_image = $move_status == TRUE ? $page_image : $default_logo;



// $profile->brochure_id = $brochure_id;
// $profile->name = $name;
// $profile->image = $page_image;
// $profile->roll_no = $roll_no;
// $profile->age = $age;
// $profile->gender = $gender;
// $profile->short_bio = $short_bio;
// $profile->long_bio = $long_bio;
// $profile->education1 = $education1;
// $profile->education2 = $education2;
// $profile->workex_total = $workex_total;
// $profile->co_name_1 = $co_name_1;
// $profile->co_exp_1 = $co_exp_1;
// $profile->co_name_2 = $co_name_2;
// $profile->co_exp_2 = $co_exp_2;
// $profile->co_name_3 = $co_name_3;
// $profile->co_exp_3 = $co_exp_3;
// $profile->co_name_4 = $co_name_4;
// $profile->co_exp_4 = $co_exp_4;
// $profile->co_name_5 = $co_name_5;
// $profile->co_exp_5 = $co_exp_5;
// $profile->international_exp = $international_exp;
// $profile->career_highlights = $career_highlights;
// $profile->achievements = $achievements;
// $profile->certifications = $certifications;
// $profile->linkedin = $linkedin;
// $profile->video_profile = $video_profile;
// $profile->update_at = $update_at;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editProfile() == true) {
        
        $profile->pa_profile_id = $id;
        $profile->deletegraduation();
//        print_r($attribute1id);
//        print_r($attribute2id);
//        print_r($id);
        
        foreach ($attribute1id as $value) {
            $profile->pa_profile_id = $id;
            $profile->pa_attribute_value_id = $value;

            $graduationvaluesRow = $profile->addattributevalues();
            //exit;
                        // print_r($graduationvaluesRow);

        }

        $profile->pa_profile_id = $id;
        $profile->deletespecialization();

        foreach ($attribute2id as $value) {

            $profile->pa_profile_id = $id;
            $profile->pa_attribute_value_id = $value;

            $specializationvaluesRow = $profile->addattributevalues();
             //print_r($specializationvaluesRow);
        }
       // exit;
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Profile is edit successfully.';
        header('Location: career.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit profile.';
        header('Location: career.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: career.php');
}

