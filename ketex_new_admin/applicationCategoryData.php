<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `application_category` SET `cat_name` = '".$title."',`updated_at` = now() WHERE `cat_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Application Category Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `application_category` VALUES(null,'".$title."','',now(),now())";
		$conn->query($sql);
		$_SESSION['message'] = 'Application Category Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
		
header("location:applicationCategory.php");


?>