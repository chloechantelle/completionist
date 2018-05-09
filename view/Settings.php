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
        <h1>Option 3</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
      </div>
    </div>
    <div class="col hide-on-small-only m3 l2">
      <ul class="spy left section table-of-contents">
        <li><a href="#1">Debugging</a></li>
        <li><a href="#2">All users</a></li>
        <li><a href="#3">Option 3</a></li>
      </ul>
    </div>
  </div>

<script>

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
  
// $(document).ready(function () {
//   $('#get-data').click(function () {
//     var showData = $('#show-data');

//     $.getJSON('users.json', function (data) {
//       // console.log(data);

//       var users = data.users.map(function (item) {
//         return item.Email + ': ' + item.FirstName;
//       });

//       showData.empty();

//       if (users.length) {
//         var content = '<li>' + users.join('</li><li>') + '</li>';
//         var list = $('<ul />').html(content);
//         showData.append(list);
//       }
//     });

//     showData.text('loading...');
//   });
// });

</script>

<?php
			include '../view/footer.php';
?>	