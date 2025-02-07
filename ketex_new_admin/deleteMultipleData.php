<?php
session_start();
include_once('conn.php');
extract($_POST);

    $myCheckboxes = explode(",",$myCheckboxes);
    
    foreach($myCheckboxes as $productId){
		$sql = "DELETE FROM `".$tableName."` WHERE `".$key."` = '".$productId."' ";	
		$conn->query($sql);
    }
    
echo 'success';    

?>