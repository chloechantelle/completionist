<?php	
session_start();
include '../model/db.php';  
include 'header.php'; 	
// include '../navigation.php';
?>	

<?php
if (isset($_SESSION['LoggedIn'])) {
    // unset($_SESSION['LoggedIn']);
     include 'navigation.php'; 
}
else {
   include 'pubnav.php'; 
   ?><style>.contact {display: none;}</style><?php
}

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
  $gamequery = ' SELECT contract.Status, contract.GameID, games.GameTitle, contract.TimeGiven, contract.PaymentAmount
FROM contract
INNER JOIN games
ON contract.GameID=games.GameID where contract.Status = "Completed" ';

  $stmt = $conn->prepare($gamequery);
  $stmt->execute();
  $gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // $bookresult = $conn->query($contentquery);
?>

	<?php 
	foreach($adminresult as $row) {
	echo'
	<div class="admin">

	<div class="adminleft">
	<img src="../view/img/avi.png">
	<h1>@' . $row['SteamID'] . '</h1>
	<h2><i class="material-icons">verified_user</i> ' . $row['Role'] . '</h2>
        ';}?>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>

	</div>

	<div class="adminright">

 <table class="striped centered">
        <thead>
          <tr>
              <th>Game</th>
              <th>Time Given</th>
              <th>Payment Amount</th>
              <th>Current Status</th>
          </tr>
        </thead>

        <tbody>

<?php 
  foreach($gameresult as $game) {
  echo'
          <tr>
            <td>' . $game['GameTitle'] . '</td>              
            <td>' . $game['TimeGiven'] . '</td>              
            <td>$' . $game['PaymentAmount'] . '</td>              
            <td>' . $game['Status'] . '</td>              
          </tr>
          ';}?>

          <!-- <tr>
            <td>GameName</td>
            <td>3Hours</td>
            <td>$100</td>
          </tr>

          <tr>
            <td>GameName</td>
            <td>3Hours</td>
            <td>$100</td>
          </tr>

           <tr>
            <td>GameName</td>
            <td>3Hours</td>
            <td>$100</td>
          </tr>

           <tr>
            <td>GameName</td>
            <td>3Hours</td>
            <td>$100</td>
          </tr>

           <tr>
            <td>GameName</td>
            <td>3Hours</td>
            <td>$100</td>
          </tr>
 -->
        </tbody>
      </table>
	
	</div>

	</div>	
	
	</div>

  <a target="_blank" href="mailto:completionist@chloechantelle.com" class="contact btn-floating btn-large waves-effect waves"><i class="material-icons">mail_outline</i></a>

<?php
	include '../view/footer.php';
?>