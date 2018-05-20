<?php
	session_start();
	include '../model/db.php';
	// include 'header.php';
	// include 'navigation.php';
?>
<?php

// search emails
// $select_sql = "  select Email, Password from users where Email = ' " . $_POST['Email'] . " '  and Password = ' " . $_POST['Password'] . " '  ;";

// function to search for existing users
$select_sql = "select * from users where Email = '" . $_POST['Email'] . "' and Password = '" . $_POST['Password'] . "' ;";		
$stmt = $conn->prepare($select_sql);
$stmt->execute();
$result = $stmt->fetchAll();

// grab role for session variable
$getquery = "   SELECT * FROM `users` where Email = '" . $_POST['Email'] . "' ";
$stmt = $conn->prepare($getquery);
$stmt->execute();
$getresult = $stmt->fetch(PDO::FETCH_ASSOC);

// set variables
$email = ($_POST['Email']);
$role = ($getresult['Role']);
$ID =  ($getresult['UserID']);
$avi =  ($getresult['Avi']);

// if it exists
if (count($result) ) {
	// echo "Email exists!";
	$_SESSION['LoggedIn'] = true;
	$_SESSION['CurrentUser'] = $email;
	$_SESSION['Role'] = $role;
	$_SESSION['Avi'] = $avi;
	$_SESSION['UserID'] = $ID;
	$_SESSION['Debug'] = 'Off';
	echo "Correct login!";
	header('Location: ../view/about.php');
}

// if it doesn't exist
else {		
	echo "Incorrect!";
	// header('HTTP/1.1 401 Unauthorized', true, 401);
	// run function to show JS pop up for below message
	// echo "Incorrect username or password!";
	// header('Location: ../index.php');
}

?>
