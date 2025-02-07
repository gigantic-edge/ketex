<?php

session_start();

include_once '../conn.php';

if(isset($_POST['delete'])){
    
	$checkbox = $_POST['draw'];
	
	for($j=0;$j<count($checkbox);$j++){
	    
	$id = $checkbox[$j]; 
	
	mysqli_query($com,"DELETE FROM enquiry WHERE id ='".$id."'");
	
    $_SESSION['succ_profile_add'] = 'Delete successfully.';
    
    header('Location: enquiry_a.php');
}
}

$v = mysqli_query($com,"SELECT * FROM enquiry");

?>