<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/order.php");

$order = new order($conn);
//echo '<pre>';
//print_r($_POST);
//exit;
$quotationmasteridarr = $_POST['quotationmasterid'];
$quotationdetailsidarr = $_POST['quotationdetailsid'];
$quantityarr = $_POST['quantity'];
$quotationpricearr = $_POST['quotation_price'];

$countarr = count($quotationpricearr);

$check = true;




for ($j = 0; $j < $countarr; $j++) {
    if (!is_numeric($quotationpricearr[$j])) {
        $check = false;
    }
}

if ($check == false) {

    $_SESSION['fail_price_edit'] = 'Price is not numeric.';
    header('Location: editSchemeDetails.php?qmid=' . $quotationmasteridarr[0]);
    exit();
} else {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->beginTransaction();

        $addflag = true;



        for ($i = 0; $i < $countarr; $i++) {

            $order->qd_quotation_unit_price = $quotationpricearr[$i];
            $total = $quotationpricearr[$i] * $quantityarr[$i];
           
            $order->qd_quotation_total_price = $total;
            $order->qd_id = $quotationdetailsidarr[$i];
            //echo $order->updateQuantityProductScheme();
            if ($order->updateQuantityProductScheme() == true) {
                $add = true;
            } else {
                $addflag = false;
            }
        }

        if ($addflag == true) {
            $conn->commit();

            $_SESSION['succ_price_edit'] = 'Quotation price is added successfully.';
            header('Location: editSchemeDetails.php?qmid=' . $quotationmasteridarr[0]);
        } else {
            $conn->rollBack();
            $_SESSION['fail_price_edit'] = 'Error to add quotation price.';
            header('Location: editSchemeDetails.php?qmid=' . $quotationmasteridarr[0]);
        }
    } catch (Exception $e) {
        $conn->rollBack();
        $fail = "Failed: " . $e->getMessage();
        $_SESSION['fail_price_edit'] = $fail;
        header('Location: editSchemeDetails.php?qmid=' . $quotationmasteridarr[0]);
    }
}
