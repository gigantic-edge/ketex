<?php
session_start();
// echo $_REQUEST['id'];
// exit();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `career_enquiry` WHERE `enquiry_id` = '".$_GET['id']."' ";	
		$res=$conn->query($sql);
		if($res==true){
		    	$_SESSION['message'] = 'Job Enquiry Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
		}
		
		header("location:jobEnquiry.php");
?>