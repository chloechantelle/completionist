<?php	
session_start();
include '../model/db.php';	
include '../view/header.php';	
include '../view/navigation.php';
?>	

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

$stmt = $conn->prepare($insert_sql);
$stmt->execute();

echo '
<div class="message">
<p>Submitted contract!</p>
<p>Redirecting you back to contracts</p>
</div>
';
?>

<?php
include '../view/footer.php';
?>	
