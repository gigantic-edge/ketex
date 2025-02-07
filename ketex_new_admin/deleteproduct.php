<?php
session_start();
// echo $_REQUEST['id'];
// exit();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `product_details` WHERE `pro_id` = '".$_GET['id']."' ";	
		$res=$conn->query($sql);
		if($res==true){
		    	$_SESSION['message'] = 'Product Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
		}
		header("location:productList.php");
		
header("location:productList.php");

?>