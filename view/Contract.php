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
<style><?php include '../view/style.css';?></style> 
<script src="../view/javascript.js"></script>

<?php
$gameselect = " SELECT * FROM `games`";
$stmt = $conn->prepare($gameselect);
$stmt->execute();
$gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$userselect = " SELECT * FROM `users`";
$stmt = $conn->prepare($userselect);
$stmt->execute();
$userresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<form name="registration" class="contract" action="../controller/add_process.php" method="post">

    <div class="input-field col s12 m6">

        <select name="GameID" class="icons">
            <option selected>Choose game</option>
            <?php 
            foreach($gameresult as $game) {
                echo'
                <option value="' . $game['GameID'] . '" data-icon="' . $game['Cover'] . '" class="circle">
                ' . $game['GameTitle'] . '
                </option>'      
                ;}?>
            </select>

            <select name="UserID" class="icons">
                <option selected>Choose user</option>
                <?php 
                foreach($userresult as $user) {
                    echo'
                    <option value="' . $user['UserID'] . '" data-icon="' . $user['Avi'] . '" class="circle">
                    ' . $user['Email'] . '
                    </option>'      
                    ;}?>
                </select>

            </div>

            <input type="text" class="datepicker" id="Date" name="Date" placeholder="Current Date">
            <input type="text" id="PaymentAmount" name="PaymentAmount" placeholder="Payment Amount">
            <input type="text" id="TimeGiven" name="TimeGiven" placeholder="Approximate Time To Finish (in hours)">

            <label>Current Status</label>
            <select id="Status" name="Status">
                <option>Awaiting Confirmation</option>
                <option>Payment Recieved</option>
                <option>In Progress</option>
                <option>Completed</option>
            </select>

            <div class="submit">
                <input class="sub waves-effect waves-light btn-large" type="submit" name="submit" value="Create Contract!">
            </div>

        </form>

        <?php
        include '../view/footer.php';
        ?>  