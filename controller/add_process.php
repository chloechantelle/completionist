<?php	
include '../model/db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>
	

<?php

$insert_sql = "INSERT INTO contract(PaymentDate, PaymentAmount) values ('4/4/4', '50')";	

// '" . $_POST['PaymentDate'] . "',
// '" . $_POST['GameTitle'] . "',
// '" . $_POST['PaymentAmount'] . "'

// INSERT INTO 
// contract(PaymentDate, PaymentAmount)
// values ('4/4/4', '50');

// insert into
// games(GameTitle)
// VALUES ('NameName')

$stmt = $conn->prepare($insert_sql);
$stmt->execute();

?>

