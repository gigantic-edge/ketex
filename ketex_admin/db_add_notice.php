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


$title = $_POST['title'];
$content = $_POST['content'];
$date = $_POST['date'];

// image

$original_nm_photo = $_FILES['image']['name'];

$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");

$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".", $original_nm_photo);

$exts = end($extension);

$move_status = false;

$default_logo = '';

if (($_FILES['image']) && in_array($exts, $allowedexts)) {

    $newname = notice . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;

    $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    $notice_image = $newname;
}
$notice_image = $move_status == TRUE ? $notice_image : $default_logo;


$original_nm_photo = $_FILES['pdf']['name'];
$allowedexts = array("pdf");
$document_path = realpath(__DIR__ . '/../') . $database->document_path_site_image;

$extension = explode(".", $original_nm_photo);
$exts = end($extension);
$move_status = false;
$default_logo = '';
if (($_FILES['pdf']) && in_array($exts, $allowedexts)) {
    $newname = $pro_name . date('d-m-y') . "_" . time() . "." . $exts;

    $destination = $document_path . $newname;
    $move_status = move_uploaded_file($_FILES['pdf']['tmp_name'], $destination);
    $page_pdf = $newname;
}
$page_pdf = $move_status == TRUE ? $page_pdf : $default_logo;


$profile->title = $title;
$profile->notice_image = $notice_image;
$profile->content = $content;
$profile->date = $date;
$profile->pdf = $page_pdf;


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addNotice() == true) {

        
    } else {
        $addflag = false;
    }

//exit;
    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Page is added successfully.';
        header('Location: notice_a.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add Page.';
        header('Location: notice_a.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: notice_a.php');
}