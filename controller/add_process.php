<?php	
include '../model/db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>
	

<?php

// INSERT INTO `contract`(`PaymentDate`, `PaymentAmount`, `GameID`, `UserID`) VALUES ('20/03/17', '$100', 2, 2);

// INSERT INTO `contractstatus`(`StatusID`, `CurrentStatus` `GameID`) VALUES ('Working On', 3);

$insert_sql = "INSERT INTO contract(PaymentDate, PaymentAmount, TimeGiven, GameID) values
(  '" . $_POST['PaymentDate'] . "',
'" . $_POST['PaymentAmount'] . "',
'" . $_POST['TimeGiven'] . "',
'" . $_POST['GameTitle'] . "'
  ) ";	

$stmt = $conn->prepare($insert_sql);
$stmt->execute();

echo "Created new contract!";
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

