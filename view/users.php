<?php	
session_start();
include '../model/db.php';  
// include 'header.php'; 	
// include 'navigation.php';
?>	

<?php  
  $usersquery = ' SELECT * FROM users' ;
  $stmt = $conn->prepare($usersquery);
  $stmt->execute();
  $userresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
// $myObj->name = "John";
// $myObj->age = 30;
// $myObj->city = "New York";

// $myJSON = json_encode($myObj);

// echo $myJSON;
?> 

<select name="UserID" class="icons">
<option selected>Choose user</option>
<?php 
    foreach($userresult as $user) {
      echo'
      <option value="' . $user['UserID'] . '" data-icon="../view/img/pachimari.png" class="circle">
      ' . $user['Email'] . ', ' . $user['UserID'] . '
      </option>'      
    ;}?>
</select>