<?php

session_start();

require_once("../db/config.php");
$database = new Database();
$conn = $database->connect();
if (!isset($_SESSION['userid'])) {
    header('Location: ' . $database->base_url . 'admin/index.php');
}

require_once("includes/header_top.php");
require_once("includes/headerInc.php");
require_once("class/settings.php");
$base_url = $database->base_url;
$document_path_signature = $database->document_path_signature;
  $id = $_GET['id'];

$settings = new settings($conn);

$settings->id = $id;
$settingsarr = $settings->singlesettingsedit();

 

include 'html/editsettingsInc.php';


require_once("includes/footerInc.php");
?>
<script type="text/javascript">
    function valid()
    {
        if (document.chngpwd.opwd.value == "")
        {
            alert("Old Password Filed is Empty !!");
            document.chngpwd.opwd.focus();
            return false;
        } else if (document.chngpwd.npwd.value == "")
        {
            alert("New Password Filed is Empty !!");
            document.chngpwd.npwd.focus();
            return false;
        } else if (document.chngpwd.cpwd.value == "")
        {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cpwd.focus();
            return false;
        } else if (document.chngpwd.npwd.value != document.chngpwd.cpwd.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            document.chngpwd.cpwd.focus();
            return false;
        }
        return true;
    }
</script>


