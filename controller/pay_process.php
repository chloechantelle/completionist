<?php
header('Refresh: 2; URL=../view/requests.php');
?>

<?php	
// error_reporting(-1);
session_start();
include '../model/db.php';	
include '../view/header.php';	
include '../view/navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<?php

// update contract
$update = "UPDATE contract SET
Status = 'Confirmed and Payed' WHERE ContractID = ' " . $_GET['ContractID'] . " '
";
$stmt = $conn->prepare($update);
$stmt->execute();

echo '
<div class="message">
<p>Confirmed contract!</p>
<p>Redirecting you back to contracts</p>
</div>
';

?>

<?php
include '../view/footer.php';
?>	
