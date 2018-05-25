<?php   
session_start();
include '../model/db.php';  
include 'header.php';   
include 'navigation.php';
?>  

<style><?php include '../view/style.css';?></style> 
<script src="../view/javascript.js"></script>

<div class="content">

    <?php
    $gamequery = ' 
    SELECT * FROM contract
    INNER JOIN games
    ON contract.GameID=games.GameID where contract.Status = "Completed" 
    ';

    $stmt = $conn->prepare($gamequery);
    $stmt->execute();
    $gameresult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h3>About this project</h3>        
    <p>This project was created with the idea in mind that The Completionist will earn the customers wanted achievements/trophies fora price depending on the amount of hours and difficulty of the chosen game.</p>

    <h3>About The Completionist <i class="material-icons">verified_user</i></h3>
    <p>The Completionist is a gamer who has had an interest in finishing games to there entirety since they were a child. They have turned this interest into a business and now allow those without the time or effort to also have an outstanding collection of platinum trophies or achievements. </p>

</div>

<div class="adminright">

    <table class="striped centered">
        <thead>
            <tr>
                <th>Game</th>
                <th>Time Given</th>
                <th>Payment Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>          

            <?php 
            foreach($gameresult as $game) {
                echo'
                <tr onClick="game(' . $game['ContractID'] . ');" class="modal-trigger" href="#gamemodal">
                <td>' . $game['GameTitle'] . '</td>   

                <td>

                ' . $game['TimeGiven'] . ' hours</td>              
                <td>$' . $game['PaymentAmount'] . '</td>              
                <td>' . $game['Status'] . '<i class="material-icons right">event_available</i>
                </td></tr></a>  
                
                ';}

                $ContractID = $game['ContractID'];

                ?></a>       

                <div id="gamemodal" class="modal">
                    <div class="modal-content">
                        <div id="more"></div>
                    </div>
                </div>

            </tbody>
        </table>


        <div class="formcontainer">

            <h3>Contact The Completionist</h3>

            <form id="form" method="POST">

                <!-- email -->

                <div class="input-field col s6">

                    <i class="material-icons prefix">alternate_email</i>          
                    <input id="icon_prefix1" required type="text" name="email">
                    <label for="icon_prefix1">Email</label>
                </div>

                <!-- subject -->

                <div class="input-field col s6">

                    <i class="material-icons prefix">subject</i>          
                    <input id="icon_prefix2" required type="text" name="subject">
                    <label for="icon_prefix2">Subject</label>
                </div>

                <!--  message  -->

                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea required name="message" id="icon_prefix3" class="materialize-textarea message"></textarea>
                    <label for="icon_prefix3">Message</label>
                </div>

                <button class="btn waves-effect waves-light" name="action" type="button" onClick="send();">Submit<i class="material-icons right">send</i></button>

            </form>

            <div id="success">
                <h1>Email sent!</h1>
            </div>  

            <div id="data"></div>

        </div>

        
    </div>

</div>  

</div>

<script>

    function hideForm() {
        form.style.display = 'none';
        success.style.display = 'block';
    }

    function send() {         
// e.preventDefault();
var form = $('#form');
var formData = $(form).serialize();
// console.log(data);
// console.log(error);

$.ajax({
    type: "POST",
    url: "../controller/mail.php",
    data: formData,   
    success: function(data) {   

                        // hide form UI
                        hideForm();       
                        console.log(data);
                        
                        console.log('Success');
                    },
                    error: function(error) {
                        console.log('Nope');
                    }
                });
};

function game(ContractID) {   

    $.ajax({
        type: "GET",
        url: "game.php?ContractID=" + ContractID,
        success: function(data) {   

                console.log(ContractID);
                console.log(data); 
                document.getElementById("more").innerHTML = data;

        },
        error: function(error) {
            alert('Error');
        }
    });
};
</script>  

<?php
include '../view/footer.php';
?>