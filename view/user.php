<?php
header('Content-Type: application/json');
include '../model/db.php';  
// include '../view/javascript.js';  

$userselect = " SELECT Email, FirstName FROM `users`";
$stmt = $conn->prepare($userselect);
$stmt->execute();
$userresult = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach($userresult as $user) {

	  // $encoded = json_encode($user);
	  // file_put_contents('users.json', $encoded);
	  // print $encoded;
	  // echo $user;		

if ($userresult) {
	// $encodeResult = json_encode($userresult);
	echo json_encode($userresult);
	// $arr = echo json_encode($userresult);
	// echo $arr;
		// $encode = echo json_encode($userresult);
		// echo json_decode($userresult);
		// $decode = json_decode($userresult);
		// echo json_decode($userresult);		
		// var_dump;
}

else {
	echo json_encode(Array('user'=>false));
}

exit();
?>