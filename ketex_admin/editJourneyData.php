<?php
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/branches.php");
extract($_POST);

$branches = new branches($conn);

$date=date("Y/m/d");

$branches->id = $id;
$branches->year = htmlentities($year);
$branches->title = htmlentities($title);
$branches->description = htmlentities($description);
$branches->createdAt = $date;

   

try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($branches->editJourney() == true) {

    } else {
        $addflag = false;
    }

    if ($addflag == true) {
        $conn->commit();

        $_SESSION['successMessage'] = 'Journey Edit Successfully.';
        header('Location: journeyList.php');
    } else {
        $conn->rollBack();
        $_SESSION['failMessage'] = 'Error to add Journey.';
        header('Location: journeyList.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['failMessage'] = $fail;
    header('Location: journeyList.php');
}
?>