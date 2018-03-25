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

// set variables
$date = $_POST['PaymentDate'];
$amount = $_POST['PaymentAmount'];
$time = $_POST['TimeGiven'];
$status = $_POST['Status'];
// $gameID = $_POST['GameID'];

// create contract
$insert_sql = "INSERT INTO contract (PaymentDate, PaymentAmount, TimeGiven, Status, GameID) 
VALUES
(  '" . $_POST['PaymentDate'] . "',
'" . $_POST['PaymentAmount'] . "',
'" . $_POST['TimeGiven'] . "',
'" . $_POST['Status'] . "', 
'" . $_POST['GameID'] . "'

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

// '" . $_POST['PaymentDate'] . "',
// '" . $_POST['GameTitle'] . "',
// '" . $_POST['PaymentAmount'] . "'

// INSERT INTO 
// contract(PaymentDate, PaymentAmount)
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
