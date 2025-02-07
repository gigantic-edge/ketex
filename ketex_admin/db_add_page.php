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


$page_title = $_POST['page_title'];
$content = $_POST['content'];
$page_heading = $_POST['page_heading'];
$meta_description = $_POST['meta_description'];
$meta_keywords = $_POST['meta_keywords'];





$profile->page_title = $page_title;
$profile->content = $content;
$profile->page_heading = $page_heading;
$profile->meta_description = $meta_description;
$profile->meta_keywords = $meta_keywords;









try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addPage() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Page is added successfully.';
        header('Location: cms_management.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add Page.';
        header('Location: cms_management.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: cms_management.php');
}