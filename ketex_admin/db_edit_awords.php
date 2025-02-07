<?php

date_default_timezone_set("Asia/Kolkata");
session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
require_once("class/profile.php");

$profile = new profile($conn);



$id = $_POST['profile_id'];
$description = $_POST['description'];
$year = $_POST['year'];


$profile->profile_id = $id;
$singleawords = $profile->singleawords();



$profile->description = $description;
$profile->year = $year;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->editAwords() == true) {
        
     
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Update is successfully';
        header("Location: awords_a.php?id={$id}");
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to edit Product details.';
        header("Location: awords_a.php?id={$id}");
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: awords_a.php');
}