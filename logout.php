<?php
include 'connect.php';
session_start();
 if(isset($_SESSION['log_id']))
 {
unset($_SESSION['log_id']);
header("location:log.php");
 }
?>