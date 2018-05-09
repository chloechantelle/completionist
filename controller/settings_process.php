<?php
	session_start();
	include '../model/db.php';
	// include 'header.php';
	// include 'navigation.php';
?>
<?php

if (isset($_SESSION['Debug']) && $_SESSION['Debug'] == 'On') {
	$_SESSION['Debug'] = 'Off';
	// echo $_SESSION['Debug'];
}
elseif (isset($_SESSION['Debug']) && $_SESSION['Debug'] == 'Off') {
	$_SESSION['Debug'] = 'On';
	// echo $_SESSION['Debug'];
}
elseif(isset($_SESSION['Debug']) && !empty($_SESSION['Debug'])) {
	$_SESSION['Debug'] = 'Off';
	echo $_SESSION['Debug'];
}
else {
	// $_SESSION['Debug'] = 'On';
}
	header('Location: ../view/Settings.php');


?>
