<?php
session_start();
include '../model/db.php';
include '../view/header.php';
    // include 'navigation.php';
?>


<?php

// search for existing users
$select_sql = "select * from users where Email = '" . $_POST['Email'] . "' and Password = '" . $_POST['Password'] . "' ;";      
$stmt = $conn->prepare($select_sql);
$stmt->execute();
$result = $stmt->fetchAll();

// grab role for session variable
$getquery = "   SELECT * FROM `users` where Email = '" . $_POST['Email'] . "' ";
$stmt = $conn->prepare($getquery);
$stmt->execute();
$getresult = $stmt->fetch(PDO::FETCH_ASSOC);

// set variables
$password = $_POST['Password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// var_dump($hashed_password);

$email = ($_POST['Email']);
$role = 'Customer';

// if it exists
if (count($result) ) {
    echo "Email exists already!";   
}

// if it doesn't exist
else {      

// set variables
    $_SESSION['LoggedIn'] = true;
    $_SESSION['CurrentUser'] = $email;
    $_SESSION['Role'] = $role;

// insert user
    $register = "INSERT INTO users(Email, Password, Role) VALUES (
    '" . $_POST['Email'] . "',
    '$hashed_password',
    'Customer'
)";
    $stmt = $conn->prepare($register);
    $stmt->execute();

// redirect user    
    echo'Registered!';
    foreach ($_SESSION as $key=>$val)
                  echo $key." : ".$val."<br/>";
header('Refresh: 5; URL=../view/ActiveRequests.php');              
}

?>