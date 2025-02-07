<?php

session_start();
require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/settings.php");
$settings = new settings($conn);

if (isset($_POST['Submit'])) {

    $oldpass = md5($_POST['opwd']);
    $userid = $_POST['id'];
    $newpassword = md5($_POST['npwd']);

    $num = $settings->singlepass();
   
    if ($oldpass == $num['user_pass']) {
        // echo 'pree';
        $settings->id = $userid;
        $settings->user_pass = $newpassword;
        $changepassword = $settings->chngepass();
     
        $_SESSION['succ_profile_add'] = "Password Changed Successfully !!";
        header('Location: editsettings.php');
    } else {
       // echo 'pro';
        $_SESSION['fail_profile_add'] = "Old Password not match !!";
       header('Location: editsettings.php');
    }
}

