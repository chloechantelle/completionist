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

	$getquery = '
	SELECT * FROM contract 
	inner join users on contract.UserID = users.UserID
	inner join games on contract.GameID = games.GameID
	-- inner join contractstatus on contract.ContractID = contractstatus.ContractID
	-- where contract.ContractID = "132"
	where contract.ContractID = ' . $_GET['ContractID'] . '
	';

	$stmt = $conn->prepare($getquery);
	$stmt->execute();
	$getresult = $stmt->fetch(PDO::FETCH_ASSOC);
	?>	

	<?php

	// foreach($getresult as $row) {
	echo'
	<form class="contract" action="../controller/update_process.php?ContractID=' . $_GET['ContractID'] . '" method="post">

	<h4 class="center">Contract for ' . $getresult['FirstName'] . ' ' . $getresult['LastName'] . ' 
	for ' . $getresult['GameTitle'] . '</h4>

	<label>Current Status</label>
	<select name="Status">
	<option selected>' . $getresult['Status'] . '</option>
	<option disabled></option>
	<option>Awaiting Confirmation</option>
	<option>Payment Recieved</option>
	<option>In Progress</option>
	<option>Completed</option>
	</select>

	<label>Payment Amount</label>
	<label>Payment Amount</label>
	<input value="' . $getresult['PaymentAmount'] . '" type="text" name="PaymentAmount" placeholder="Payment Amount">

	<label>Time Given</label>
	<input value="' . $getresult['TimeGiven'] . '" type="text" name="TimeGiven" placeholder="Time Given">

	<div class="submit">
	<input class="sub waves-effect waves-light btn-large" type="submit" name="submit" value="Update Contract!">
      	</div>
	</form>';
	// }
	?>

<?php
	include '../view/footer.php';
?>	
