<?php
session_start();
include '../model/db.php';
	// include 'header.php';
	// include 'navigation.php';
?>
<?php

$ID = $_SESSION['UserID'];
$Avi = $_POST['image'];
$Ava = "../view/img/avi/$Avi";

$insert = 'UPDATE users SET Avi = "../view/img/avi/' . $Avi . ' " where UserID = " ' . $ID . ' "
';	

$stmmt = $conn->prepare($insert);
$stmmt->execute();

$_SESSION['Avi'] = $Ava;
header('Location: ../view/settings.php');
?>