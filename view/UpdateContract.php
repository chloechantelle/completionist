	<?php
	session_start();
	include '../model/db.php';  
	include 'header.php';	
	include 'navigation.php';
	?>
	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>
	<!-- load JS -->
	<script src="../view/javascript.js"></script>

	<?php

	$getquery = "   SELECT * FROM `games`, `users`, `contract`, `contractstatus` ";

	// $getquery = "   SELECT * FROM `games`, `users`, `contract`, `contractstatus`
	//  where contractstatus.ContractID = 1   ";

	// $getquery = '   SELECT * FROM `games`, `contract`, `contractstatus`
	// where contractstatus.ContractID = ' . $_GET['ContractID'] . '   ';

	$stmt = $conn->prepare($getquery);
	$stmt->execute();
	$getresult = $stmt->fetch(PDO::FETCH_ASSOC);
	// $bookresult = $conn->query($contentquery);
	?>	

	<?php
	echo'
	<form class="add" action="../model/update_book.php?ContractID=' . $getresult['ContractID'] . '" method="post">

	<label>User</label>
	<input value="' . $getresult['FirstName'] . '" type="text" name="GameTitle" placeholder="GameTitle">

	<label>Game Title</label>
	<input value="' . $getresult['GameTitle'] . '" type="text" name="GameTitle" placeholder="GameTitle">
	<label>Current Status</label>
	<input value="' . $getresult['CurrentStatus'] . '" type="text" name="CurrentStatus" placeholder="CurrentStatus">

	<label>Payment Amount</label>
	<input value="' . $getresult['PaymentAmount'] . '" type="text" name="PaymentAmount" placeholder="PaymentAmount">

	<input type="submit" value="Update Contract"</input>
	</form>';
	''
	?>

<?php
	include '../view/footer.php';
?>	
