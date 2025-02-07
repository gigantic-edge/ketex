<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `product_category` SET `cat_name` = '".$title."',`sort_number` = '".$sort_number."',`updated_at` = now() WHERE `cat_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Product Category Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `product_category` VALUES(null,'".$title."','".$sort_number."',now(),now())";
		$conn->query($sql);
		$_SESSION['message'] = 'Product Category Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
		
header("location:productCategory.php");


?>