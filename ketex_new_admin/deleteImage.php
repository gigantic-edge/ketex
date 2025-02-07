<?php
session_start();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `product_image` WHERE `proimg_id` = '".$_GET['id']."' ";	
		$conn->query($sql);
		
		$_SESSION['message'] = 'Product Image Deleted Successfully!';
		$_SESSION['msgColor'] = 'green';

header("location:manageImages.php?id=".$_GET['pro_img']);


?>