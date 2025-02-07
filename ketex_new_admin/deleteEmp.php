<?php
session_start();
// echo $_REQUEST['id'];
// exit();
include_once('conn.php');
extract($_POST);
    
  
		$sql = "DELETE FROM `employee_department_details` WHERE `emp_id` = '".$_GET['id']."' ";	
		$res=$conn->query($sql);
		if($res==true){
		    	$_SESSION['message'] = 'Employee Deleted Successfully!'; 
            	$_SESSION['msgColor'] = 'green';
		}
		header("location:employeeList.php");
?>