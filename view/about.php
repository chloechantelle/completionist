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
  $gamequery = ' 
  SELECT * FROM contract
INNER JOIN games
ON contract.GameID=games.GameID where contract.Status = "Completed" 
';

  $stmt = $conn->prepare($gamequery);
  $stmt->execute();
  $gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // $bookresult = $conn->query($contentquery);
?>

<h3>About this project</h3>        
<p>This project was created with the idea in mind that The Completionist will earn the customers wanted achievements/trophies fora price depending on the amount of hours and difficulty of the chosen game.</p>

<h3>About The Completionist <i class="material-icons">verified_user</i></h3>
<p>The Completionist is a gamer who has had an interest in finishing games to there entirety since they were a child. They have turned this interest into a business and now allow those without the time or effort to also have an outstanding collection of platinum trophies or achievements. </p>

	</div>

	<div class="adminright">

 <table class="striped centered">
        <thead>
          <tr>
              <th>Game</th>
              <th>Time Given</th>
              <th>Payment Amount</th>
              <th>Status</th>
          </tr>
        </thead>

        <tbody>          

<?php 
  foreach($gameresult as $game) {
  echo'
           <tr onClick="game(' . $game['ContractID'] . ');" class="modal-trigger" href="#gamemodal">
           <td>' . $game['GameTitle'] . '</td>   

            <td>

            ' . $game['TimeGiven'] . ' hours</td>              
            <td>$' . $game['PaymentAmount'] . '</td>              
            <td>' . $game['Status'] . '<i class="material-icons right">event_available</i>
            </td></tr></a>  
          
          ';}

$ContractID = $game['ContractID'];

          ?></a>       

<div id="gamemodal" class="modal">
    <div class="modal-content">
<div id="more"></div>
</div>
</div>

<!-- only showing last value -->

<script>
// function gme() {  
// $("td").click(function() {
function game(ContractID) {  
    // e.preventDefault();
       

    $.ajax({
        type: "GET",
        // url: "game.php",
        url: "game.php?ContractID=" + ContractID,
        // data: "ContractID=" + ContractID,        
        success: function(data) {   
            console.log(ContractID);
            console.log(data); 
            document.getElementById("more").innerHTML = data;
        },
        error: function(error) {
            alert('Error');
        }
    });
};
</script>  

        </tbody>
      </table>
	
	</div>

	</div>	
	
	</div>

<!-- on hold for alternative -->
  <!-- <a target="_blank" href="mailto:completionist@chloechantelle.com" class="contact btn-floating btn-large waves-effect waves"><i class="material-icons">mail_outline</i></a> -->

<?php
	include '../view/footer.php';
?>