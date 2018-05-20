<?php
session_start();
include '../model/db.php';
include '../view/header.php';
include '../view/navigation.php';
header('Refresh: 5; URL=../view/about.php');              
?>

<style><?php include '../view/style.css';?></style> 
<script src="../view/javascript.js"></script>

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
    echo '
    <div class="message">
    <p>Email exists already!</p>
    </div>
    '; 
}

// if it doesn't exist
else {      

// set variables
    $_SESSION['LoggedIn'] = true;
    $_SESSION['CurrentUser'] = $email;
    $_SESSION['Role'] = $role;

// insert user
    $register = "INSERT INTO users(Email, Password, Role, Avi) VALUES (
    '" . $_POST['Email'] . "',
    '$hashed_password',
    'Customer',
    '../view/img/default.png'
)";
    $stmt = $conn->prepare($register);
    $stmt->execute();        

    echo '
    <div class="logout"><h1>Registered! 
    Welcome ' . $_POST['Email'] . '!
    </h1>
    <p>Redirecting you now. Click here if you do not get redirected.</p></div>
    ';

// redirect user    
    // echo'Registered!';
    // foreach ($_SESSION as $key=>$val)
                  // echo $key." : ".$val."<br/>";
// header('Refresh: 5; URL=../view/about.php');              
}

?>

<?php
include '../view/footer.php';
?>