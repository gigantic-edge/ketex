<?php
session_start();

include_once('conn.php');
extract($_POST);
    
  
		$sql = "SELECT * FROM `product_details` WHERE `pro_id` = '".$_GET['id']."' ";	
		$statement=$conn->query($sql);
		$data = $statement->fetch();
		$res=$data['pdf'];
		
		
// 		$filedel="https://ketex.com/upload/profile_image/".$res;
		$path = $_SERVER['DOCUMENT_ROOT'].'/upload/profile_image/'.$res;
		
// 		echo($path);
// 		exit();
	    
	    if (!empty($path)) {
	        
	    $status=unlink($path);    
            if($status){  
            	$_SESSION['message'] = 'PDF File Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
            }else{  
            echo "PDF File is not deleted!";    
            } 
	    }
	    else{
	        echo "The file you want to delete does not exist ";
	    }
	    $que="UPDATE `product_details` SET `pdf`='' WHERE pro_id='".$_GET['id']."' ";
	    $conn->query($que);
		
header("location:productList.php");

?>