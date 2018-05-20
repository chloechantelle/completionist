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

echo $ID;
echo $Avi;
echo $Ava;

$insert = 'UPDATE users SET Avi = "../view/img/avi/' . $Avi . ' " where UserID = " ' . $ID . ' "
 ';	

$stmmt = $conn->prepare($insert);
$stmmt->execute();

// $avi = "../img/avi/' . $_POST['image'] . ' ";
// $_SESSION['Avatar'] = $avi;
echo 'Uploaded!';
$_SESSION['Avi'] = $Ava;
header('Location: ../view/settings.php');
?>