<?php	
session_start();

// if user isn't admin, redirect to login

if (isset($_SESSION['Role']) ) {
  }
else {
  header("Location: ../index.php");
}

include '../model/db.php';  
include 'header.php';
include 'navigation.php';
?>	

<script src="../view/javascript.js"></script>
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
echo 'Debug:';
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

        <!-- not via ajax -->
        <!-- <a href="#" id="get-data">List users (function)</a> -->
        <!-- <div id="show-data"></div>         -->

        <!-- via ajax -->
        <a href="#" onClick="users();">Lists users (ajax)</a>
        <div id="data"></div>

      </div>

      <div id="3" class="section scrollspy">
        <h1>Avatar Upload</h1>
        <p>Upload image to database and show image as users avatar</p>

<!-- enctype="multipart/form-data" breaks insert???? -->

<form class="add" action="../controller/upload_process.php" method="post">
  <input type="file" name="image">
  <input type="submit" value="Normal Upload!">
</form>

<!-- <form class="add" method="post" enctype="multipart/form-data"> -->
  <!-- <input type="file" id="image" name="image"> -->
  <!-- <button name="imagebut" onClick="upload()">Ajax Upload!</button> -->
  <!-- <button type="button" name="imagebut" onClick="upload()">Ajax Upload!</button> -->
<!-- </form> -->

        <div id="image">

        </div>

<style>
#image {
  border: 1px solid black;
}
</style>

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

// function upload() {  
    // e.preventDefault();  
    // var image = $('#image');     

    $.ajax({
        type: "POST",
        data: "data",
        // data: image,
        url: "../controller/upload_process.php",
        success: function(data) {   

            // alert(data);
            console.log(data);
            alert('Uploaded');
            document.getElementById("image").innerHTML = data;

        },
        error: function(error) {
            alert('Error');
            console.log(data);
        }
    });
// };
};

function users() {  
$.ajax({
        type: "GET",
        url: "user.php",
        // url: "users.json",
        data: "data",   
        dataType: "json",     
        success: function(data) {   
            // console.log(data); 
          if (data) {            
            // alert('Success!');
            document.getElementById("data").innerHTML = JSON.stringify(data);
            // console.log(JSON.stringify(data)); 
            // console.log(data);      
                 // decode and show?
            // console.log($encode);
            }        
            else {
              alert('Fail!');
            }    
        },
        error: function(error) {
            alert('Error');
            console.log(error);
            console.log(data);
            document.getElementById("data").innerHTML = data;
        }
    });
};

</script>

<?php
			include '../view/footer.php';
?>	