<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `journey` SET `year` = '".$year."',`title` = '".$title."',`description` = '".$description."',`createdAt` = now() WHERE `id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Journey Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `journey` VALUES(null,'".$year."','".$title."','".$description."',now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Journey Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    

header("location:journey.php");


?>