<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `branches` SET `map` = '".$map."',`title` = '".$title."',`address` = '".$address."',`phone` = '".$phone."',`fax` = '".$fax."'
		,`email` = '".$email."',`createdAt` = now() WHERE `id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Branch Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `branches` VALUES(null,'".$map."','".$title."','".$address."','".$phone."','".$fax."','".$email."',now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Branch Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    

header("location:branch.php");


?>