<?php
// header('Refresh: 3; URL=../view/ActiveRequests.php');
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

$getselect = '
SELECT * FROM contract 
inner join users on contract.UserID = users.UserID
inner join games on contract.GameID = games.GameID
where contract.ContractID = ' . $_GET['ContractID'] . '
';

$stmt = $conn->prepare($getselect);
$stmt->execute();
$getresulta = $stmt->fetch(PDO::FETCH_ASSOC);

// sanitize variables
$paysan = $_POST['PaymentAmount'];
$timesan = $_POST['TimeGiven'];

// sanitize
$pay = filter_var($paysan, FILTER_SANITIZE_STRING);
$time = filter_var($timesan, FILTER_SANITIZE_STRING);

// set variables
$status = $_POST['Status'];

// update contract
$update = "UPDATE contract SET
PaymentAmount =  '" . $_POST['PaymentAmount'] . "', 
TimeGiven =  '" . $time . "', 
Status = '" . $_POST['Status'] . "' WHERE ContractID = ' " . $_GET['ContractID'] . " '
";
// ' " . $_GET['ContractID'] . " '
$stmt = $conn->prepare($update);
$stmt->execute();

// test
// print_r($_POST);  

echo '
<div class="message">
<p>Updated contract!</p>
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
