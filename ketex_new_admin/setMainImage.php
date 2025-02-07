<?php
session_start();
include_once('conn.php');
extract($_POST);

		$sql = "UPDATE `product_image` SET `image_position` = '0' WHERE `pro_id` = '".$pro_id."' ";
		$conn->query($sql);
		
		$sql = "UPDATE `product_image` SET `image_position` = '1' WHERE `proimg_id` = '".$img_id."' ";
		$conn->query($sql);
		
?>