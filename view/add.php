	<?php
	// connect to DB
	include '../model/db.php';
	// load external scripts
	include '../view/header.php';
	// show navbar
	include '../view/navigation.php';
	?>
	<!-- load CSS -->
	<style><?php include '../view/style.css';?></style>
	<!-- load JS -->
	<script src="../view/javascript.js"></script>

	<form class="add" action="../controller/add_book.php" method="post">
		<input type="text" name="booktitle" placeholder="Book Title">
		<input type="text" name="originaltitle" placeholder="Original Title">
		<!-- <input type="text" name="authorfirst" placeholder="Author First Name"> -->
		<!-- <input type="text" name="authorlast" placeholder="Author Last Name"> -->
		<input type="text" name="year" placeholder="Year of Publication">
		<input type="text" name="genre" placeholder="Genre">
		<input type="text" name="sold" placeholder="Millions Sold">			
		<input type="text" name="language" placeholder="Language Written">	
		<input type="text" name="cover" placeholder="Book Cover">
		<input type="submit" name="submit" value="Add New Book">
	</form>