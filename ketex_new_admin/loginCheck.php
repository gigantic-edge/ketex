<?php 
ob_start();
session_start();
include_once('conn1.php');

extract($_POST);

$sql = "SELECT * FROM `admin_master` where `am_user_id` = '".$username."' && `am_password` = '".md5($password)."'"; 
$result = $conn->prepare($sql); 
$result->execute(); 
$number_of_rows = $result->fetchColumn(); 
if($number_of_rows=='0'){
$_SESSION['login_message'] = 'Please Check Username Or Password';
header('location:login.php');
}
else{

$sql = "SELECT * FROM `admin_master` where `am_user_id` = '".$username."' && `am_password` = '".md5($password)."'"; 
$result = $conn->prepare($sql); 
$result->execute(); 
$data =  $result->fetch();


$_SESSION['ketexAdminID'] = $data['am_id'];
header('location:index.php');


}

?>