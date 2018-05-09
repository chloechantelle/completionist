<?php
header('Refresh: 3; URL=../view/ActiveRequests.php');
?>

<?php	
// error_reporting(-1);
session_start();
include '../model/db.php';	
include '../view/header.php';	
include '../view/navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<?php

// sanitize variables
$beforedate = $_POST['Date'];
$beforeamount = $_POST['PaymentAmount'];
$beforetime = $_POST['TimeGiven'];

// sanitize
$date = filter_var($beforedate, FILTER_SANITIZE_STRING);
$amount = filter_var($beforeamount, FILTER_SANITIZE_STRING);
$time = filter_var($beforetime, FILTER_SANITIZE_STRING);

// set variables
$status = $_POST['Status'];

// create contract
$insert_sql = "INSERT INTO contract (Date, PaymentAmount, TimeGiven, Status, GameID, UserID) 
VALUES
(
  '" . $date . "',
'" . $amount . "',
'" . $time . "',
'" . $_POST['Status'] . "', 
'" . $_POST['GameID'] . "',
'" . $_POST['UserID'] . "'

);";

$stmt = $conn->prepare($insert_sql);
$stmt->execute();

// test
// print_r($_POST);  

echo '
<div class="message">
<p>Created new contract!</p>
<p>Redirecting you back to contracts</p>
</div>
';

// '" . $_POST['Date'] . "',
// '" . $_POST['GameTitle'] . "',
// '" . $_POST['PaymentAmount'] . "'

// INSERT INTO 
// contract(Date, PaymentAmount)
// values ('4/4/4', '50');

// insert into
// games(GameTitle)
// VALUES ('NameName')

// $stmt = $conn->prepare($insert_sql);
// $stmt->execute();

?>

<?php
			include '../view/footer.php';
?>	
