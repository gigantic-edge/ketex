<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `notice_board` SET `title` = '".$title."',`date` = '".$date."',`content` = '".addslashes($content)."' WHERE `id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Notice Board Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `notice_board` VALUES(null,'".$title."','','".$date."','".addslashes($content)."','')";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Notice Board Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    
		
if(isset($_FILES["notice_image"]["name"]) && $_FILES["notice_image"]["name"] != ''){
	
$temp = explode(".", $_FILES["notice_image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["notice_image"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `notice_board` SET `image` = '".$newfilename."' WHERE `id` = '".$id."'";	
		$conn->query($sql);
} 

if(isset($_FILES["notice_pdf"]["name"]) && $_FILES["notice_pdf"]["name"] != ''){
	
$temp = explode(".", $_FILES["notice_pdf"]["name"]);
$newfilename = round(microtime(true)) . '_pdf.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["notice_pdf"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `notice_board` SET `pdf` = '".$newfilename."' WHERE `id` = '".$id."'";	
		$conn->query($sql);
} 

header("location:noticeBoard.php");


?>