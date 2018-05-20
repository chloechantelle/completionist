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
	<form class="contract" action="../controller/pay_process.php?ContractID=' . $_GET['ContractID'] . '" method="post">

	<h4 class="center">Pay for contract for ' . $getresult['FirstName'] . ' ' . $getresult['LastName'] . ' 
	for ' . $getresult['GameTitle'] . '</h4>

		<div class="message">
	<p>Current Status:
	' . $getresult['Status'] . ' </p>

	<p>Payment Amount:
	$' . $getresult['PaymentAmount'] . ' </p>

	<p>Time Given:
	' . $getresult['TimeGiven'] . ' hours </p>


</div>

	<div class="submit">
	<p class="center">
  <label>
        <input type="checkbox" class="filled-in">
        <span>I agree to the terms and conditions</span>
  </label>
    </p>
	<input class="pay sub waves-effect waves-light btn-large" type="submit" name="submit" value="Confirm contract">
      	</div>
	</form>';
	// }
	?>

<?php
	include '../view/footer.php';
?>	
