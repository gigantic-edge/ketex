<?php
date_default_timezone_set("Asia/Kolkata");
session_start();
extract($_POST);
require_once("./db/config1.php");

		$sql ="SELECT * FROM `product_details` WHERE `pro_name` = '".$keyword."'";
        $query2 = $conn->query($sql);
        $productData = $query2->fetch(PDO::FETCH_LAZY); 

        if(isset($productData['pro_id'])){
            header("location:product_details.php?id=".$productData['pro_id']);
        } else {
            header("location:index.php");
        }

?>		