<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Thesis/system/initialize.php';
unset($_SESSION['SBUser']);
header('Location: login.php');
?>
