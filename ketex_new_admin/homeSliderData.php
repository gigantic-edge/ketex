<?php
session_start();
include_once('conn.php');
extract($_POST);
    
		
if(isset($_FILES["slider"]["name"]) && $_FILES["slider"]["name"] != ''){
	
$temp = explode(".", $_FILES["slider"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "homeSlider/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["slider"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "INSERT INTO `homeSlider` VALUES(null,'".$newfilename."','".$allTime."','".$festivalDate."',now())";	
		$conn->query($sql);
} 
		
		$_SESSION['message'] = 'Slider Added Successfully!';
		$_SESSION['msgColor'] = 'green';

header("location:homeSlider.php");


?>