<?php
session_start();
// echo $_REQUEST['id'];
// exit();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `job_details` WHERE `job_id` = '".$_GET['id']."' ";	
		$res=$conn->query($sql);
		if($res==true){
		    	$_SESSION['message'] = 'Job Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
		}
		header("location:joblisting.php");
		
header("location:joblisting.php");

?>