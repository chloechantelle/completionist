<?php	
session_start();
include '../model/db.php';  
include 'header.php';
include 'navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<?php
$gameselect = " SELECT * FROM `games`";
$stmt = $conn->prepare($gameselect);
$stmt->execute();
$gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$userselect = " SELECT * FROM `users`";
$stmt = $conn->prepare($userselect);
$stmt->execute();
$userresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form name="registration" class="contract" action="../controller/useradd_process.php" method="post">

<div class="input-field col s12 m6">

<select required name="GameID" class="icons">

<option disabled>Choose game</option>

<!-- <optgroup label="Choose game"> -->

<?php 
    foreach($gameresult as $game) {
      echo'
      <option value="' . $game['GameID'] . '" data-icon="' . $game['Cover'] . '" class="circle">
      ' . $game['GameTitle'] . '
      </option>'      
    ;}?>
</select>

<?php 
$email = $_SESSION['CurrentUser'];
$ID = $_SESSION['UserID'];
?>

<select required name="UserID" class="icons" disabled>
<?php
echo'
      <option value="' . $ID . '" data-icon="../view/img/pachimari.png" class="circle">
      ' . $email . '
      </option>'     
?>  
</select>


  </div>

       <p class="center">
        Request will be submitted and then approved by an admin. Once approved you will be notified with a set price and estimated time it'll take to be completed. Once agreed upon and the payment has been recieved the completing can be started!
       </p>

       <div class="submit">
	<input class="sub waves-effect waves-light btn-large" type="submit" name="submit" value="Submit Request!">
      </div>

	</form>

<?php
			include '../view/footer.php';
?>	