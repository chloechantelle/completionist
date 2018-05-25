<?php	
session_start();
include '../model/db.php';  
// include 'header.php'; 	
// include 'navigation.php';
?>	

<?php  
// echo $_GET['ContractID'];

$gamequery = ' SELECT * FROM contract INNER JOIN games
ON contract.GameID=games.GameID where contract.ContractID = ' . $_GET['ContractID'] . ' ' ;
$stmt = $conn->prepare($gamequery);
$stmt->execute();
$gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($gameresult as $game) {
	echo'
	
	<div class="text right">
	<p><i class="material-icons">date_range</i> Date Released: ' . $game['DateReleased'] . '</p>
	<p><i class="material-icons">games</i> Game Platform: ' . $game['GamePlatform'] . '</p></div>

	<div class="img left"<p><img class="gameimg" src="' . $game['Cover'] . '"></p></div>
	
	';}
	?>