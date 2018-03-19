<?php	
include 'db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<?php
$contractselect = " SELECT * FROM `games`, `contract`, `contractstatus` ";
?>

	<form class="contract" action="../controller/add_process.php" method="post">

	<input type="text" name="GameTitle" placeholder="Game Title">
	<input type="text" name="PaymentDate" placeholder="Current Date">
	<input type="text" name="PaymentAmount" placeholder="Payment Amount">

		<input type="submit" name="submit" value="Create Contract">

	</form>

<?php
			include '../view/footer.php';
?>	