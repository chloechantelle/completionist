<?php
	session_start();
	include '../model/db.php';
	// include 'header.php';
	// include 'navigation.php';
?>
<?php

	// echo "Email exists!";
	$_SESSION['Debug'] = On;
	header('Location: ../view/Settings.php');

?>
