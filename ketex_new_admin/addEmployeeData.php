<?php
session_start();
include_once('conn.php');
extract($_POST);

if($submit == "Update"){
		$sql = "UPDATE `employee_department_details` SET `dep_id` = '".$dep_id."',`employee_name` = '".$employee_name."',`emp_designation` = '".$emp_designation."',
		`sort_number` = '".$sort_number."',`update_add` = now() WHERE `emp_id` = '".$id."' ";
		$conn->query($sql);
		$_SESSION['message'] = 'Employee Updated Successfully!';
    
} else { 
		$sql = "INSERT INTO `employee_department_details` VALUES(null,'".$dep_id."','','".$employee_name."','".$emp_designation."','".$sort_number."',now(),now())";
		$conn->query($sql);
		$id = $conn->lastInsertId();
		$_SESSION['message'] = 'Employee Added Successfully!';
}		
		$_SESSION['msgColor'] = 'green';
    
		
if(isset($_FILES["employee_image"]["name"]) && $_FILES["employee_image"]["name"] != ''){
	
$temp = explode(".", $_FILES["employee_image"]["name"]);
$newfilename = round(microtime(true)) . '.' . end($temp);

$target_dir = "../upload/profile_image/";
$target_file = $target_dir.$newfilename;

    if (move_uploaded_file($_FILES["employee_image"]["tmp_name"], $target_file)) {
        
    } else {
        
    } 
  
		$sql = "UPDATE `employee_department_details` SET `employee_image` = '".$newfilename."' WHERE `emp_id` = '".$id."'";	
		$conn->query($sql);
}
echo "<script>window.location.href='https://ketex.com/ketex_new_admin/employeeList.php';</script>";
//header("Location:employeeList.php");
//exit();

?>