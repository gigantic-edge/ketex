<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/settings.php");
$base_url = $database->base_url;
$document_path_logo = $database->document_path_logo;

$settings = new settings($conn);


$id = $_POST['id'];

$user_login = $_POST['user_login'];
$email = $_POST['email'];
$website_name = $_POST['website_name'];
$keyword = $_POST['keyword'];
$description = $_POST['description'];
$meta_title = $_POST['meta_title'];


//$settings->admin_name = $admin_name;
//$lastarr = $settings->lastsettingsforslug();
//$count = count($lastarr);
//$settings->id = $id;
//$singlesettingsarr= $settings->editsettings();
$original_nm_photo = $_FILES['logo']['name'];
$allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "svg");
$document_path = realpath(__DIR__ . '/..') . $document_path_logo;
$extension = explode(".", $original_nm_photo);
$exts = end($extension);
$move_status = false;
$default_logo = '';
if (($_FILES['logo']['size'] < 500000000) && in_array($exts, $allowedexts)) {
    $newname = 'productctegory_' . date('d-m-y') . "_" . time() . "." . $exts;
    $destination = $document_path . $newname;
    $move_status = move_uploaded_file($_FILES['signature']['tmp_name'], $destination);
    $logo = $newname;
}
$logo = $move_status == TRUE ? $logo : $default_logo;

$settings->id = $id;
$settings->user_login = $user_login;
$settings->email = $email;
$settings->website_name = $website_name;
$settings->keyword = $keyword;
$settings->description = $description;
$settings->meta_title = $meta_title;
$settings->image = $logo;
$settings->date_added = date('Y-m-d');

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($settings->editsettings() == true) {
        $addflag = true;
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_settings_add'] = 'Settings is edited successfully.';
        header('Location: settings.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_settings_add'] = 'Error to edit settings.';
        header('Location: settings.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_settings_add'] = $fail;
    header('Location: settings.php');
}