<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `job_details` SET `job_name`='".$job_name."',`job_detail`='".$job_detail."',`sort_number`='".$sort_number."',`update_at`=now() WHERE `job_id`='".$id."'";
		$conn->query($sql);
		$_SESSION['message'] = 'Job Post Updated Successfully!';
		$_SESSION['msgColor'] = 'green';
    
} else { 
		$sql = "INSERT INTO `job_details`(`job_name`, `job_detail`, `sort_number`, `created_at`, `update_at`) VALUES ('".$job_name."','".$job_detail."','".$sort_number."',now(),now())";
		$conn->query($sql);
		
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Job Post Added Successfully!';
		$_SESSION['msgColor'] = 'green';
}		

header("location:joblisting.php");


?>