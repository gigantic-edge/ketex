<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require_once("../db/config.php");
require_once("class/login.php");

$database = new Database();
$conn = $database->connect();
$login_exec = new login($conn);
$username = isset($_POST['username']) ? (trim($_POST['username'])) : (null);
$pass = isset($_POST['password']) ? (trim($_POST['password'])) : (null);



if ($username != null && $pass != null) {

    $login_exec->username = $_POST['username'];
    $login_exec->password = md5($_POST['password']);
    

    if ($login_exec->authenticate() == 0) {
        
        

       $_SESSION['login_failed'] = "invalid Credentials";
        
        header('Location: index.php');
    } else {
        $row = $login_exec->loginDetails();
        
        
        
        
        $_SESSION['username'] = $row['user_login'];
        $_SESSION['userid'] = $row['id'];
        
        //$_SESSION['userFullname'] = $row['am_name'];
        $_SESSION['usermail'] = $row['email'];
        $_SESSION['role'] = 'admin';

        header('Location: '. $database->admin_url. 'dashboard.php');
    }
} else {
    $_SESSION['login_failed'] = "Credentials are empty";
    header('Location: index.php');
}