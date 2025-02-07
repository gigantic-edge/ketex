<?php


session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();

require_once("class/profile.php");


$profile = new profile($conn);

$cat_name = $_POST['cat_name'];

$date=date("Y/m/d h:i:s");




$profile->cat_name = $cat_name;
$profile->date = $date;



try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $addflag = true;

    if ($profile->addProfile() == true) {

       
       

        
    } else {
        $addflag = false;
    }


    if ($addflag == true) {
        $conn->commit();

        $_SESSION['succ_profile_add'] = 'Profile is added successfully.';
        header('Location: profile.php');
    } else {
        $conn->rollBack();
        $_SESSION['fail_profile_add'] = 'Error to add profile.';
        header('Location: profile.php');
    }
} catch (Exception $e) {
    $conn->rollBack();
    $fail = "Failed: " . $e->getMessage();
    $_SESSION['fail_profile_add'] = $fail;
    header('Location: profile.php');
}