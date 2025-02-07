<?php
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `application_details` SET `cat_id` = '".$cat_id."',`app_name` = '".$app_name."',`app_description` = '".$app_description."',
		`updated_at` = now() WHERE `app_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Application Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `application_details` VALUES(null,'".$cat_id."','".$app_name."','".$app_description."','',now(),now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Application Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    
		
if(isset($_FILES["app_image"]["name"]) && $_FILES["app_image"]["name"] != ''){
	
$temp = explode(".", $_FILES["app_image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["app_image"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `application_details` SET `app_image` = '".$newfilename."' WHERE `app_id` = '".$id."'";	
		$conn->query($sql);
} 

header("location:applicationList.php");


?>