	<?php
	session_start();

// if user isn't admin, redirect to login

if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Admin') {
  }
else {
  header("Location: ../index.php");
}
	
	include '../model/db.php';  
	include 'header.php';	
	include 'navigation.php';
	?>
	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>
	<!-- load JS -->
	<script src="../view/javascript.js"></script>

	<?php

	$getquery = '
	SELECT * FROM contract 
	inner join users on contract.UserID = users.UserID
	inner join games on contract.GameID = games.GameID
	-- inner join contractstatus on contract.ContractID = contractstatus.ContractID
	-- where contract.ContractID = "132"
	where contract.ContractID = ' . $_GET['ContractID'] . '
	';

	$ContractID = $_GET['ContractID'];

	$stmt = $conn->prepare($getquery);
	$stmt->execute();
	$getresult = $stmt->fetch(PDO::FETCH_ASSOC);
	?>	

<!-- loading animation -->
<!-- <div id="drawing"></div> -->

	<?php

	// foreach($getresult as $row) {
	echo'
	<form name="update" id="updatecontract" class="contract" action="../controller/update_process.php?ContractID=' . $_GET['ContractID'] . '" method="post">

	<h4 class="center">Contract for ' . $getresult['FirstName'] . ' ' . $getresult['LastName'] . ' 
	for ' . $getresult['GameTitle'] . '</h4>
	
  <div class="input-field col s12">
	<select id="Status" name="Status">
	<option selected>' . $getresult['Status'] . '</option>
	<option disabled></option>
	<option>Awaiting Confirmation</option>
	<option>Payment Recieved</option>
	<option>In Progress</option>
	<option>Completed</option>
	</select>
</div>

	<label>Payment Amount</label>
	<input value="' . $getresult['PaymentAmount'] . '" type="text" name="PaymentAmount" placeholder="Payment Amount">

	<label>Time Given</label>
	<input value="' . $getresult['TimeGiven'] . '" type="text" name="TimeGiven" placeholder="Time Given">

	</form>
	<div class="submit">
	<button id="update" class="sub waves-effect waves-light btn-large" name="submit">Update Contract!</button>

	<div id="msg" class="message">
	<p>Successfully updated!</p>
	<p><a href="../view/requests.php">Return to contracts</a></p>
	</div>

      	</div>	
	';
	// }
	?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/2.6.4/svg.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

$("#update").click(function(e) {
    e.preventDefault();
    var form = $('#updatecontract');
    var formData = $(form).serialize();

$("#loader").show();
$("#msg").hide();

    $.ajax({
        type: "POST",
        url: $(form).attr('action'),
        data: formData,        
        success: function(result) {
            // alert('Updated');
            $("#loader").hide();
            $("#msg").show();
        },
        error: function(result) {
            alert('Error');
        }
    });
});

</script>

<div id="loader" class="loader loader--style2" title="1">
  <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     width="100px" height="100px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
  <path fill="#000" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
    <animateTransform attributeType="xml"
      attributeName="transform"
      type="rotate"
      from="0 25 25"
      to="360 25 25"
      dur="1.2s"
      repeatCount="indefinite"/>
    </path>
  </svg>
</div>

<?php
	include '../view/footer.php';
?>	
