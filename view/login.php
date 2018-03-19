	<?php
	// include 'model/db.php';
	// include 'header.php';
	// include 'navigation.php';
	?>
	<!-- load JS -->
	<!-- <script src="javascript.js"></script> -->

<div class="login">
	<h1>Log in to Books Database</h1>	
	<form action="controller/login_check.php" method="post">		
		<input required type="text" name="Username" placeholder="Username">
		<input required type="password" name="password" placeholder="Password">
		<input type="submit" name="submit" value="Log in">
	</form>
<div class="notice">Don't have an account? <a href="view/register.php">Register here</a>.</div>	
</div>

<!-- 
	<form action="login_check.php" method="post">		
		<input type="email" name="email" placeholder="Email Address">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" name="submit" value="Submit!">
	</form> -->
	