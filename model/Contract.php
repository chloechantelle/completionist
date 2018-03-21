<?php	
session_start();
$_SESSION['loggedin'] = true;
$_SESSION['beep'] = 'boop';
include 'db.php';	
include '../view/header.php';	
include '../navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<?php
$contractselect = " SELECT * FROM `games`";
$stmt = $conn->prepare($contractselect);
$stmt->execute();
$contractresult = $stmt->fetch(PDO::FETCH_ASSOC);
?>

	<?php 
echo'

<form class="contract" action="../controller/add_process.php" method="post">

<div class="input-field col s12 m6">
    <select class="icons">
      <option value="" selected>Choose game</option>


      <option value="" data-icon="../view/img/pachimari.png" class="circle">
      "' . $contractresult['GameTitle'] . '"
      </option>

      <option value="" data-icon="../view/img/pachimari.png" class="circle">
      "' . $contractresult['GameTitle'] . '"
      </option>

      <option value="" data-icon="../view/img/pachimari.png" class="circle">
      "' . $contractresult['GameTitle'] . '"
      </option>

    </select>
  </div>

	<input type="text" name="PaymentDate" placeholder="Current Date">
	<input type="text" name="PaymentAmount" placeholder="Payment Amount">
	<input type="text" name="TimeGiven" placeholder="Approximate Time To Finish">

		<input type="submit" name="submit" value="Create Contract">

	</form>

';
?>	

<?php
			include '../view/footer.php';
?>	