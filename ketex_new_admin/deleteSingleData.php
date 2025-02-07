<?php
session_start();
include_once('conn.php');
extract($_POST);

		$sql = "DELETE FROM `".$tableName."` WHERE `".$key."` = '".$value."' ";	
		$conn->query($sql);
    
echo 'success';    

?>