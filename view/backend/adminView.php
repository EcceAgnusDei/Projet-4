<?php

session_start();

$_SESSION['user'] = $_GET['user'];
$_SESSION['password'] = $_GET['password'];
?>

<?php $contentAdmin=$_SESSION['user']; ?>

<?php require('adminTemplate.php'); ?>