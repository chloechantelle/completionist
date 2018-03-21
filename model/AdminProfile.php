<?php	
session_start();
// if (!isset($_SESSION)) { session_start(); }
$_SESSION['loggedin'] = true;
$_SESSION['beep'] = 'boop';

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
	<div class="admin">

	<div class="adminleft">
	<img src="../view/img/avi.png">
	<h1>@' . $row['SteamID'] . '</h1>
	<h2><i class="material-icons">verified_user</i> ' . $row['Role'] . '</h2>

<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>

	</div>

	<div class="adminright">

 <table class="striped centered">
        <thead>
          <tr>
              <th>Game Completed</th>
              <th>Time Given</th>
              <th>Payment Amount</th>
          </tr>
        </thead>

        <tbody>

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

        </tbody>
      </table>
	
	</div>

	</div>
	';}?>
	
	</div>
<?php
	include '../view/footer.php';
?>