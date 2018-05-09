	<?php
	session_start();

// if user isn't admin, redirect to login

if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Customer') {
  }
else {
  header("Location: ../index.php");
}
	
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

	<h4 class="center">Pay for contract for ' . $getresult['FirstName'] . ' ' . $getresult['LastName'] . ' 
	for ' . $getresult['GameTitle'] . '</h4>

	Current Status:
	' . $getresult['Status'] . ' <br>

	Payment Amount:
	' . $getresult['PaymentAmount'] . ' <br>

	Time Given:
	' . $getresult['TimeGiven'] . ' hours

	<div class="submit">
	<input class="sub waves-effect waves-light btn-large" type="submit" name="submit" value="Pay for contract">
      	</div>
	</form>';
	// }
	?>

<?php
	include '../view/footer.php';
?>	
