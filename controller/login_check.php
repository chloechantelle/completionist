<?php

// search emails
$select_sql = "select Username from users where Username = '" . $_POST['Username'] . "';";

// insert user
//$login_sql = "INSERT INTO `users`(`Username`, `Password`) VALUES ('" . $_POST['Username'] . "','" . $_POST['Password'] . "')";	

// connection
$conn = new PDO("mysql:host=localhost;dbname=books", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($select_sql);
$stmt->execute();

// debug

$result = $stmt->fetchAll();

// if it exists
if (count($result) ) {
	// echo "Email exists!";
	header('Location: ../model/ActiveRequests.php');
}

// if it doesn't exist
else {		
	?><script>

	window.alert("Incorrect username or password, try again!");
	window.location.href = "../index.php";

	</script>
	<?php
	// run function to show JS pop up for below message
	// echo "Incorrect username or password!";
	// header('Location: ../index.php');
}

?>
