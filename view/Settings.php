<?php   
session_start();
include '../model/db.php';  
include '../view/header.php';
include '../view/navigation.php';

// if user isn't admin, redirect to login

if (isset($_SESSION['Role']) ) {
}
else {
    header("Location: ../index.php");
}
?>   
<!-- fix - not grabbing css file from header -->
<style><?php include '../view/style.css';?></style>

<div class="row">
    <div class="settings right col s12 m9 l10">
        <div id="1" class="section scrollspy">
            <h1>Debugging</h1>
            
            <form action="../controller/settings_process.php" method="post">

                <div id="checkbox-container">

                    <div class="switch">
                        <label for="option1">Off
                            <input onClick="buttonfunction()" type="checkbox" id="option1">
                            <span class="lever"></span>
                            On
                        </label>
                    </div>

                </div>

                <?php
                echo 'Debug: ';
                echo $_SESSION['Debug'];
                ?>

                <p>Show or hide the debugging information at the bottom of the page.</p>      

                <div class="submit">
                    <input id="settingsbutt" class="btn" type="submit" name="submit" value="Save changes">
                </div>      
            </div>
        </form>

        <div id="2" class="section scrollspy">
            <h1>All users</h1>

            <a href="#" onClick="users();">Show all users</a>
            <div id="data"></div>

        </div>

        <div id="3" class="section scrollspy">
            <h1>Avatar Upload</h1>
            <p>Upload image to database and show image as users avatar</p>

            <form class="add" action="../controller/upload_process.php" method="post">

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="upload">
                    <input class="waves-effect waves-light btn-large" type="submit" value="Upload!"></div>

                </form>

                <div id="image">

                </div>

            </div>
        </div>
        <div class="col hide-on-small-only m3 l2">
            <ul class="spy left section table-of-contents">
                <li><a href="#1">Debugging</a></li>
                <li><a href="#2">All users</a></li>
                <li><a href="#3">Avatar Upload</a></li>
            </ul>
        </div>
    </div>

    <script>

        function upload() {

            $.ajax({
                type: "POST",
                data: "data",
                url: "../controller/upload_process.php",
                success: function(data) {   

                        console.log(data);
                        alert('Uploaded');
                        document.getElementById("image").innerHTML = data;

                    },
                    error: function(error) {
                        alert('Error');
                        console.log(data);
                    }
                });
        };

        function users() {  
            $.ajax({
                type: "GET",
                url: "user.php",
                data: "data",   
                dataType: "json",     
                success: function(data) {   

                    if (data) {            
                    // alert('Success!');
                    
                    // loop array
                    for (var i = 0; i < data.length; i++){
                        var obj = data[i];
                        for (var key in obj){
                            var attrName = key;
                            var attrValue = obj[key];
                        // full result
                        var equals = "<br>" + key + ": " + obj[key] + "<br>";     
                        // show result
                        document.getElementById("data").innerHTML += equals;
                    }                    
                }
            }        
            else {
                alert('Fail!');
            }    
        },
        error: function(error) {
            alert('Error');
            console.log(error);
            console.log(data);
        }
    });
        };

    </script>

    <?php
    include '../view/footer.php';
    ?>  