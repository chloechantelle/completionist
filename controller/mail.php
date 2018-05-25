<?php  
session_start();
include '../model/db.php';  

// sanitize variables
$beemail = $_POST['email'];
$beesubject = $_POST['subject'];
$beemsg = $_POST['message'];

// sanitize
$mail = trim(filter_var($beemail, FILTER_SANITIZE_STRING));
$sub = filter_var($beesubject, FILTER_SANITIZE_STRING);
$msg = filter_var($beemsg, FILTER_SANITIZE_STRING);

// create contract
$insert = "INSERT INTO messages (email, subject, message) 
VALUES
(
	'" . $mail . "',
	'" . $sub . "',
	'" . $msg . "'
);";

$stmt = $conn->prepare($insert);
$stmt->execute();

$to = $mail;
$subject = $sub;
$message = $msg;

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'From: <chloe@chloechantelle.com>' . "\r\n";

mail($to,$subject,$message,$headers);

?>