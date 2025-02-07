<?php
session_start();
include_once('conn.php');
extract($_POST);


if($submit == "Update"){
		$sql = "UPDATE `awords` SET `description` = '".$description."',`year` = '".$year."' WHERE `id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Award Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `awords` VALUES(null,'','".$description."','".$year."')";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Award Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    
		
if(isset($_FILES["award_image"]["name"]) && $_FILES["award_image"]["name"] != ''){
	
$temp = explode(".", $_FILES["award_image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["award_image"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `awords` SET `image` = '".$newfilename."' WHERE `id` = '".$id."'";	
		$conn->query($sql);
} 


header("location:award.php");


?>