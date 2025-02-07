<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `pages` SET `page_title` = '".$page_title."',`page_heading` = '".$page_heading."',`content` = '".addslashes($content)."' WHERE `page_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Page Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `pages` VALUES(null,'".$page_title."','".addslashes($content)."','".$page_heading."','','')";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Page Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    

header("location:cmsPages.php");


?>