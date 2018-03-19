<?php	
include 'db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<div class="content">

	<?php

	// $activequery = " SELECT contract.*, contractstatus.*, games.*
	// FROM contract JOIN contractstatus ON contractstatus.GameID = contract.GameID JOIN games ON games.GameID = contractstatus.GameID ";

	$activequery = " SELECT * FROM `games`, `contract`, `contractstatus` ";

	$stmt = $conn->prepare($activequery);
	$stmt->execute();
	$activeresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>

		<?php 
		foreach($activeresult as $row) {
			echo'

<div class="row">
<div class="col s12 m7">
<div class="card small">
<div class="card-image">
	<img src="../view/img/sample.png">
	<span class="card-title">' . $row['GameTitle'] . '</span>
</div>
<div class="card-content">
<p>
	' . $row['GamePlatform'] . ' •
	' . $row['CurrentStatus'] . ' •
	' . $row['PaymentDate'] . '
</p>
</div>            
</div>
</div>
</div>			
			
			';}
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