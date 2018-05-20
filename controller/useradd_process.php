<?php
// header('Refresh: 3; URL=../view/about.php');
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
$ID = $_SESSION['UserID'];

// create contract
$insert_sql = "INSERT INTO `contract` (`ContractID`, `Date`, `PaymentAmount`, `TimeGiven`, `Status`, `GameID`, `UserID`) 
VALUES
( NULL, '', '', '', 'Submitted', 
'" . $_POST['GameID'] . "',
'$ID'

);";

// '" . $_POST['UserID'] . "'

$stmt = $conn->prepare($insert_sql);
$stmt->execute();

// test
// print_r($_POST);  

echo '
<div class="message">
<p>Submitted contract!</p>
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
