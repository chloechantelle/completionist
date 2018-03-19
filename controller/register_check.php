<?php
	include '../model/db.php';
	include '../view/header.php';
	// include 'navigation.php';
?>


<?php

// search users
$select_sql = "select Username from users where Username = '" . $_POST['Username'] . "';";

// insert user
$login_sql = "INSERT INTO users(Username, Password) VALUES ('" . $_POST['Username'] . "','" . $_POST['Password'] . "')";

$stmt = $conn->prepare($login_sql);
$stmt->execute();
header('Location: ../model/view_books.php');

?>