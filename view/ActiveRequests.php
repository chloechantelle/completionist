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

	// $activequery = " SELECT contract.*, contractstatus.*, games.*
	// FROM contract JOIN contractstatus ON contractstatus.GameID = contract.GameID JOIN games ON games.GameID = contractstatus.GameID ";

	// $activequery = " SELECT * FROM `games`, `contract`, `contractstatus` ";

  $activequery = ' SELECT games.Cover, contract.Status, contract.GameID, games.GameTitle, contract.TimeGiven, contract.PaymentAmount
FROM contract
INNER JOIN games
ON contract.GameID=games.GameID where contract.Status <> "Completed" ';

	$stmt = $conn->prepare($activequery);
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
            ' . $row['TimeGiven'] . ' •
            $' . $row['PaymentAmount'] . ' •              
	' . $row['Status'] . '
</p>
<div class="submit submitupdate">
<input class="sub waves-effect waves-light btn-large right" type="submit" name="submit" value="Update Contract">
</div>
</div>            
</div>
</div>
</div>			
			
';}?>	
		

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