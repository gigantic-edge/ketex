<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `employee_department` SET `department_name` = '".$department_name."',`sort_number` = '".$sort_number."',`update_add` = now() WHERE `dep_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Department Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `employee_department` VALUES(null,'".$department_name."','".$sort_number."',now(),now())";
		$conn->query($sql);
		$_SESSION['message'] = 'Department Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
		
header("location:empDepartment.php");


?>