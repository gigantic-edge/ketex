<?php 
ob_start();
session_start();

include_once('conn.php');
$_SESSION['logout_success'] = '1';

unset($_SESSION['ketexAdminID']);
header('location:login.php');

?>