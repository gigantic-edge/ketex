<?php
session_start();
// echo $_REQUEST['id'];
// exit();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `ketex_clients` WHERE `id` = '".$_GET['id']."' ";	
		$res=$conn->query($sql);
		if($res==true){
		    	$_SESSION['message'] = 'Client Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
		}
		
		header("location:client.php");
?>