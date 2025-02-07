<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/users.php");


$users = new users($conn);


$umid = $_POST['umid'];
$company_name = $_POST['company_name'];
$user_name = $_POST['user_name'];
$gst = $_POST['gst'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$pin = $_POST['pin'];
$state = $_POST['state'];
$phone = $_POST['phone'];
$alternate_phone = $_POST['alternate_phone'];
$email = $_POST['email'];

if (isset($_POST['um_active'])) {
    $status = $_POST['um_active'];
} else {
    $status = '1';
}


$users->um_id = $umid;
$users->um_gst = $gst;
$users->um_company = $company_name;
$users->um_name = $user_name;
$users->um_address1 = $address1;
$users->um_address2 = $address2;
$users->um_pin = $pin;
$users->um_state = $state;
$users->um_phone1 = $phone;
$users->um_phone2 = $alternate_phone;
$users->um_email = $email;
$users->um_active = $status;;


try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;


    if ($users->updateUser() == true) {
        $addflag = true;
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_user_edit'] = 'User is edited successfully.';
        header('Location: users.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_user_edit'] = 'Error to edit user.';
        header('Location: users.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_user_edit'] = $fail;
    header('Location: users.php');
}