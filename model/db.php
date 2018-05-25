<?php
$conn = new PDO("mysql:host=localhost;dbname=completionist", 'root', '');
	// stop script - throw error
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// show error, continue script
	// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
return $conn;
?>