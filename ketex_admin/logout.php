<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
require_once("../db/config.php");
require_once("class/logout.php");

$database = new Database();
$conn = $database->connect();
$logout_exec = new logout($conn);
session_destroy();

$logout_exec->date = date('Y-m-d H:i:s');
$logout_exec->admin_id = $_SESSION['userid'];
$logout_exec->lastLogin();
header('Location: index.php');

