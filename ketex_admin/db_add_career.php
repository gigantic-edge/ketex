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
$name = $_POST['name'];
//$emp_img = $_POST['emp_img'];
$linkedin_id = $_POST['linkedin_id'];
$experience = $_POST['experience'];
$in_designation = $_POST['in_designation'];
$in_logo_img = $_POST['in_logo_img'];
$out_designation = $_POST['out_designation'];
$out_logo_img = $_POST['out_logo_img'];
$body = $_POST['body'];
$update = $_POST['update'];
//$workex_total = $_POST['workex_total'];
//$co_name_1 = $_POST['co_name_1'];
//$co_exp_1 = $_POST['co_exp_1'];
//$co_name_2 = $_POST['co_name_2'];
//$co_exp_2 = $_POST['co_exp_2'];
//$co_name_3 = $_POST['co_name_3'];
//$co_exp_3 = $_POST['co_exp_3'];
//$co_name_4 = $_POST['co_name_4'];
//$co_exp_4 = $_POST['co_exp_4'];
//$co_name_5 = $_POST['co_name_5'];
//$co_exp_5 = $_POST['co_exp_5'];
//$international_exp = $_POST['international_exp'];
//$career_highlights = $_POST['career_highlights'];
//$achievements = $_POST['achievements'];
//$certifications = $_POST['certifications'];
//$linkedin = $_POST['linkedin'];
//$video_profile = $_POST['video_profile'];




$original_nm_photo = $_FILES['emp_img']['name'];
//print_r($original_nm_photo);
$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
$document_path = realpath(__DIR__ . '/..') . $database->document_path_site_career;
//print_r($document_path);
$extension = explode(".", $original_nm_photo);
//print_r($extension);
$exts = end($extension);
$move_status = false;
$default_logo = '';
if (($_FILES['image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
    $newname = $name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['emp_img']['tmp_name'], $destination);
    $emp_img = $newname;
}
$emp_img = $move_status == TRUE ? $emp_img : $default_logo;


$profile->profile_id = '';
$profile->brochure_id = $brochure_id;
$profile->name = $name;
$profile->image = $page_image;
$profile->roll_no = $roll_no;
$profile->age = $age;
$profile->gender = $gender;
$profile->short_bio = $short_bio;
$profile->long_bio = $long_bio;
$profile->education1 = $education1;
$profile->education2 = $education2;
$profile->workex_total = $workex_total;
$profile->co_name_1 = $co_name_1;
$profile->co_exp_1 = $co_exp_1;
$profile->co_name_2 = $co_name_2;
$profile->co_exp_2 = $co_exp_2;
$profile->co_name_3 = $co_name_3;
$profile->co_exp_3 = $co_exp_3;
$profile->co_name_4 = $co_name_4;
$profile->co_exp_4 = $co_exp_4;
$profile->co_name_5 = $co_name_5;
$profile->co_exp_5 = $co_exp_5;
$profile->international_exp = $international_exp;
$profile->career_highlights = $career_highlights;
$profile->achievements = $achievements;
$profile->certifications = $certifications;
$profile->linkedin = $linkedin;
$profile->video_profile = $video_profile;





try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addProfile() == true) {

       
        $lastinsertidRow = $profile->lastinsertid();
       // print_r($lastinsertidRow);

        $lastid = $lastinsertidRow['LAST_INSERT_ID()'];

        foreach ($attribute1id as $value) {
            $profile->pa_profile_id = $lastid;
            $profile->pa_attribute_value_id = $value;
            $attribute1valuesRow = $profile->addattributevalues();
        }

        foreach ($attribute2id as $value) {
            $profile->pa_profile_id = $lastid;
            $profile->pa_attribute_value_id = $value;
            $attribute2valuesRow = $profile->addattributevalues();
        }
       // print_r($specializationvaluesRow);

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Profile is added successfully.';
        header('Location: profile.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add profile.';
        header('Location: profile.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: profile.php');
}