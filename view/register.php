<?php
	include '../model/db.php';
	include 'header.php';
	// include 'navigation.php';
?>
<!-- register page bg -->
<style>
body { 
background: url("../view/images/book3blur.jpg") #fff;
}
</style>

<div class="login">
	<h1>Register for Books Database</h1>	
	<form action="../controller/register_check.php" method="post">		
		<input required type="text" name="Username" placeholder="Username">
		<input required type="password" name="Password" placeholder="Password">
		<input type="submit" name="submit" value="Register">
	</form>
<div class="notice">Already have an account? <a href="../index.php">Login here</a>.</div>		
</div>