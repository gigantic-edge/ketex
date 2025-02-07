<?php
session_start();

include_once '../conn.php';

	$checkbox = $_POST['arr'];
	
	for($j=0;$j<count($checkbox);$j++){
	    
	$id = $checkbox[$j]; 
	
	mysqli_query($com,"DELETE FROM product_details WHERE pro_id ='".$id."'");
	
}
    $_SESSION['succ_profile_add'] = 'Delete successfully.';

//header('Location: product_details.php');

?>