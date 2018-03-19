<?php	
include 'db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

	<div class="content">

<?php
	$adminquery = ' SELECT * FROM `users` WHERE `role` = "Admin"  ';

	$stmt = $conn->prepare($adminquery);
	$stmt->execute();
	$adminresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
	// $bookresult = $conn->query($contentquery);
	?>

	<?php 
	foreach($adminresult as $row) {
	echo'

	<h1>' . $row['SteamID'] . '</h1>
	<h1>' . $row['Role'] . '</h1>

	';}?>
	
	</div>

<?php
	include '../view/footer.php';
?>