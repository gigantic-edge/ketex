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
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$graduation_degree = $_POST['graduation_degree'];
$graduation_specialization = $_POST['graduation_specialization'];
$graduation_college = $_POST['graduation_college'];
$profile_graduation_institute_full_name = $_POST['graduation_percentage'];

$graduation = $_POST['graduation'];
$specialization = $_POST['specialization'];

$post_graduation_specialization_except_MBA = $_POST['post_graduation_specialization_except_MBA'];
$post_graduation_college = $_POST['post_graduation_college'];
$post_graduation_percentage = $_POST['post_graduation_percentage'];
$summer_internship_organization = $_POST['summer_internship_organization'];
$summer_internship_role = $_POST['summer_internship_role'];
$total_work_experience = $_POST['total_work_experience'];
$work_experience_company_1 = $_POST['work_experience_company_1'];
$work_experience_company_2 = $_POST['work_experience_company_2'];
$work_experience_company_3 = $_POST['work_experience_company_3'];
$live_projects = $_POST['live_projects'];
$position_of_responsibilities = $_POST['position_of_responsibilities'];
$certifications = $_POST['certifications'];
$achievements = $_POST['achievements'];
$extra_curricular_activities = $_POST['extra_curricular_activities'];
$batch = $_POST['batch'];



$original_nm_photo = $_FILES['image']['name'];
//print_r($original_nm_photo);
$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
$document_path = realpath(__DIR__ . '/..') . $database->document_path_site_image;
//print_r($document_path);
$extension = explode(".", $original_nm_photo);
//print_r($extension);
$exts = end($extension);
$move_status = false;

$profile->profile_id = $id;
$singleproarr = $profile->singleprofile();

$default_logo = $singleproarr['image'];
if (($_FILES['image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
    $newname = $name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
    $page_image = $newname;
}
$page_image = $move_status == TRUE ? $page_image : $default_logo;



$profile->profile_id = $id;
$profile->name = $name;
$profile->age = $age;
$profile->image = $page_image;
$profile->gender = $gender;
$profile->graduation_degree = $graduation_degree;
$profile->graduation_specialization = $graduation_specialization;
$profile->graduation_college = $graduation_college;
$profile->graduation_percentage = $graduation_percentage;
$profile->post_graduation_specialization_except_MBA = $post_graduation_specialization_except_MBA;
$profile->post_graduation_college = $post_graduation_college;
$profile->post_graduation_percentage = $post_graduation_percentage;
$profile->summer_internship_organization = $summer_internship_organization;
$profile->summer_internship_role = $summer_internship_role;
$profile->total_work_experience = $total_work_experience;
$profile->work_experience_company_1 = $work_experience_company_1;
$profile->work_experience_company_2 = $work_experience_company_2;
$profile->work_experience_company_3 = $work_experience_company_3;
$profile->live_projects = $live_projects;
$profile->position_of_responsibilities = $position_of_responsibilities;
$profile->certifications = $certifications;
$profile->achievements = $achievements;
$profile->extra_curricular_activities = $extra_curricular_activities;
$profile->batch = $batch;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editProfile() == true) {
        //echo '2';
        $profile->pa_profile_id = $id;
        $profile->deletegraduation();

            $profile->pa_profile_id = $id;
            $profile->pa_attribute_value_id = $graduation;

            $graduationvaluesRow = $profile->addgraduationvalues();
           
        

        $profile->pa_profile_id = $id;
        $profile->deletespecialization();

        foreach ($specialization as $value) {

            $profile->pa_profile_id = $id;
            $profile->pa_attribute_value_id = $value;

            $specializationvaluesRow = $profile->addspecializationvalues();
                       // print_r($specializationvaluesRow);

        }

       
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Profile is edit successfully.';
        header('Location: profile.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit profile.';
        header('Location: profile.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: profile.php');
}