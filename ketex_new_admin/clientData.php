<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `ketex_clients` SET `client_name` = '".$cname."',`client_description` = '".$cdescription."',`sort_number` = '".$sort_number."' WHERE `id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Client Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `ketex_clients` VALUES(null,'".$cname."','','".$cdescription."','".$sort_number."',now(),now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Client Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    
		
if(isset($_FILES["clogo"]["name"]) && $_FILES["clogo"]["name"] != ''){
	
$temp = explode(".", $_FILES["clogo"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["clogo"]["tmp_name"], $target_file)) {
        
    } else {
        
    }
		$sql = "UPDATE `ketex_clients` SET `client_image` = '".$newfilename."' WHERE `id` = '".$id."'";

		$conn->query($sql);
} 

header("location:client.php");

?>