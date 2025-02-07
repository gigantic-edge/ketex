<?php
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/branches.php");
extract($_POST);

$branches = new branches($conn);

$date=date("Y/m/d");

$branches->map = $map;
$branches->title = $title;
$branches->address = $address;
$branches->phone = $phone;
$branches->fax = $fax;
$branches->email = $email;
$branches->createdAt = $date;

   

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($branches->addBranche() == true) {

    } else {
        $addflag = false;
    }

    if ($addflag == true) {
        $conn->commit();

        $_SESSION['successMessage'] = 'Branch Added Successfully.';
        header('Location: branchesList.php');
    } else {
        $conn->rollBack();
        $_SESSION['failMessage'] = 'Error to add Branch.';
        header('Location: branchesList.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['failMessage'] = $fail;
    header('Location: branchesList.php');
}
?>