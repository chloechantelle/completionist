<?php	
session_start();	
include '../model/db.php';  
include 'header.php';	
include 'navigation.php';
?>	

<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<div class="content">

	<?php

// set ID variable for current users ID
$ID = $_SESSION['UserID'];
$role = $_SESSION['Role'];

// if admin then show all contracts
if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Admin') {

$adminquery = ' SELECT contract.ContractID, contract.PaymentDate, games.Cover, contract.Status, contract.GameID, games.GameTitle, contract.TimeGiven, contract.PaymentAmount
FROM contract
INNER JOIN games
ON contract.GameID=games.GameID
where contract.Status <> "Completed" ';
}

// // else if customer then grab customers contracts
elseif (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Customer') {

$adminquery = ' SELECT contract.ContractID, contract.PaymentDate, games.Cover, contract.Status, contract.GameID, games.GameTitle, contract.TimeGiven, contract.PaymentAmount
FROM contract
INNER JOIN games
ON contract.GameID=games.GameID
where contract.Status <> "Completed" and contract.UserID = " ' . $ID . ' " ';

}

else {
	header('Refresh: 3; URL=../index.php');
}

$stmt = $conn->prepare($adminquery);
$stmt->execute();
$activeresult = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

		<?php 
		foreach($activeresult as $row) {
			echo'

<div class="requestrow row">
<div class="requestcol col s12 m7">
<div class="requestcard card small">
<div class="card-image">
	<img src="' . $row['Cover'] . '">
	<span class="card-title">' . $row['GameTitle'] . '</span>
</div>
<div class="card-content">
<p>
	' . $row['ContractID'] . ' •
            ' . $row['TimeGiven'] . ' hrs given •
            $' . $row['PaymentAmount'] . ' cost •              
            Paid on: ' . $row['PaymentDate'] . ' •   
			' . $row['Status'] . '
</p>
<div class="submit submitupdate">
<a href="UpdateContract.php?ContractID=' . $row['ContractID'] . '" class="sub waves-effect waves-light btn-large right"><i class="material-icons left">update</i>Update Contract</a>
</div>
</div>            
</div>
</div>
</div>			
			
';}?>	

<!-- <a href="UpdateContract.php?ContractID=' . $row['ContractID'] . '" class="sub waves-effect waves-light btn-large right"><i class="material-icons left">update</i>Update Contract</a> -->
		
<div id="update" class="modal">
<div class="modal-content">

<?php
include 'UpdateContract.php?ContractID=' . $row['ContractID'] . '';
?>

<?php 
		// foreach($activeresult as $row) {
		// 	echo'

		// 	<div class="request"> 	

		// 	<div class="requestinfo"><h1>     ' . $row['GameTitle'] . ' ' . $row['GamePlatform'] . ' </h1>
		// 	<h2>     ' . $row['CurrentStatus'] . '    				  </h2>	
		// 	<h3> ' . $row['PaymentDate'] . ' </h3>

		// 	</div></div>';}
?>	

<?php
include '../view/footer.php';
?>	