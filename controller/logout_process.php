<?php	
session_start();
session_unset(); 
session_destroy(); 
include '../model/db.php';	
include '../view/header.php';	
include '../view/navigation.php';
?>

<?php
header('Refresh: 3; URL=../index.php');
?>	

<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>

<div class="logout"><h1>Logged out! Redirecting you now.</h1>
<p>Click here if you don't get redirected.</p>
</div>
