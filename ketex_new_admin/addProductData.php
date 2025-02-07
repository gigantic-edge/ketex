<?php
session_start();
include_once('conn.php');
extract($_POST);

//echo $pro_description;exit;

if($submit == "Update"){
		$sql = "UPDATE `product_details` SET `cat_id` = '".$cat_id."',`product_pdf_title` = '".$product_pdf_title."',`pro_name` = '".$pro_name."',
		`pro_description` = '".$pro_description."',`sort_number` = '".$sort_number."',`update_at` = now() WHERE `pro_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Product Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `product_details` VALUES(null,'".$cat_id."','".$product_pdf_title."','','".$pro_name."','".$pro_description."','".$sort_number."','',now(),now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Product Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
		
if(isset($_FILES["main_image"]["name"]) && $_FILES["main_image"]["name"] != ''){
	
$temp = explode(".", $_FILES["main_image"]["name"]);
$newfilename = round(microtime(true)) . '_main.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;
$wrongFile=0;
    $maxsize    = 400000;
    if(($_FILES['main_image']['size'] >= $maxsize) || ($_FILES["main_image"]["size"] == 0)) {
        $wrongFile++;
        $errors = $wrongFile.' File too large. File must be less than 400KB.';
    }

if(count($errors) === 0) {
    if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `product_image` SET `image_position` = '0' WHERE `pro_id` = '".$id."' ";	
		$conn->query($sql);
		
		$sql = "INSERT INTO `product_image` VALUES(null,'".$id."','','".$newfilename."','1')";	
		$conn->query($sql);
    } else {
        $_SESSION['productUploadError'] = $errors;
    }		
} 

if(isset($_FILES["extra_image"]["name"]) && $_FILES["extra_image"]["name"] != ''){
	
		//$sql = "DELETE FROM `product_image` WHERE `pro_id` = '".$id."' && `image_position` = '0' ";	
		//$conn->query($sql);
		
$total_count = count($_FILES['extra_image']['name']);

for( $i=0 ; $i < $total_count ; $i++ ) { 
    
$temp = explode(".", $_FILES["extra_image"]["name"][$i]);
$newfilename = $i.'_'.round(microtime(true)) . '_extra.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["extra_image"]["tmp_name"][$i], $target_file)) {
        
		$sql = "INSERT INTO `product_image` VALUES(null,'".$id."','','".$newfilename."','0')";	
		$conn->query($sql);
		
    } else {
        
    } 
		
}

}

if(isset($_FILES["pdf"]["name"]) && $_FILES["pdf"]["name"] != ''){
	
$temp = explode(".", $_FILES["pdf"]["name"]);
$newfilename = round(microtime(true)) . '_pdf.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
	    $sql = "UPDATE `product_details` SET `pdf` = '".$newfilename."' WHERE `pro_id` = '".$id."' ";
		$conn->query($sql);
} 


header("location:productList.php");


?>