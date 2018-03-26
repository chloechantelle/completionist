<html>
<body>	

	<?php
	session_start();
	include 'model/db.php';
	include 'view/header.php';		
	// $_SESSION["beep"] = 'boop';
      // session_unset(); 
      // session_destroy(); 
	?>
	<!-- content -->

<?php

if (isset($_SESSION['LoggedIn'])) {
    // unset($_SESSION['LoggedIn']);
     include 'view/navigation.php'; 
}
else {
   include 'view/pubnav.php'; 
}
?>

<form id="idForm" action="controller/login_check.php" class="col s12" method="post">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>

              <input id="icon_prefix" class="validate" required type="text" name="Email" placeholder="Email">

          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">vpn_key</i>

              <input id="icon_pass" class="validate" required type="Password" name="Password" placeholder="Password">

              <!-- <input type="Password" name="Password" placeholder="Password"> -->

          <label for="icon_pass">Password</label>          
        </div>
      <div class="subcon">
      <input class="waves-effect waves-light btn" type="submit" name="submit" value="Log in">
      <div onClick="register()" class="notice">Don't have an account? Register here.</div> 

<div id="message">yo yo</div>

<div id="messagebad">no no</div>

<style>
  #message, #messagebad {
    display: none;
  }
</style>

    </div>
      </div>
    </form>
  </div>
</div>
</div>


<script>
var frm = $('#idForm');

    frm.submit(function (e) {

        e.preventDefault();

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),            
            // success: function (data) {
            success: function(data, textStatus, xhr) {

              // correct
                if (data == "Success") {
                  // form.submit()
                  // console.log(xhr.status);
                  console.log(data); 
                  // window.location.href = 'view/ActiveRequests.php';  
                  // header('Location: view/ActiveRequests.php');  
                document.getElementById("message").style.display="block";
                }               
                // incorrect
                else {
                  // console.log(xhr.status);
                console.log(data);
                // alert(data);     
                // window.location.href = 'view/ActiveRequests.php';  
                document.getElementById("messagebad").style.display="block";
                }; 
            },
        });
    });
</script>


<!-- register modal -->
<div id="register" class="modal">
    <div class="modal-content">
  
    <!-- register -->
<div class="row">
    <form class="col s12 register" action="controller/register_check.php" method="post">      
      <div class="row">
        <h3>Register</h3>
      	<!-- Email -->
        <div class="input-field col s6">
            <i class="fas fa-envelope-open prefix"></i>
          <input id="icon_prefix" name="Email" type="text" class="validate">
          <label for="icon_prefix">Email</label>
        </div>
        <!-- Password -->
        <div class="input-field col s6">
          <i class="fas fa-key prefix"></i>
          <input id="icon_prefix" name="Password" type="password" class="validate">
          <label for="icon_prefix">Password</label>
        </div>    
         <!-- First Name -->
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">First Name</label>
        </div>
         <!-- Last Name -->
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Last Name</label>
        </div>            
         <!-- Country -->
        <div class="input-field col s6">
          <i class="fas fa-globe prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Country</label>
        </div>
         <!-- PSN -->
        <div class="input-field col s6">
          <i class="fab fa-playstation prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">PSN</label>
        </div>
         <!-- Steam -->
        <div class="input-field col s6">
          <i class="fab fa-steam prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Steam</label>
        </div>
         <!-- Xbox -->
        <div class="input-field col s6">
          <i class="fab fa-xbox prefix"></i>
          <input id="icon_prefix" type="text" class="validate">
          <label for="icon_prefix">Xbox</label>
        </div>
      </div>
      <div class="subcon">
      <input class="waves-effect waves-light btn" type="submit" name="submit" value="Register">    </div>
  </form>
</div>

<!-- <div class="login">
  <h1>Register</h1> 
  <form action="controller/login_check.php" method="post">    
    <input required type="text" name="Username" placeholder="Username">
    <input required type="password" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Log in">
  </form>
<div class="notice">Don't have an account? <a href="view/register.php">Register here</a>.</div> 
</div> -->

    </div>
  </div>

	
	<?php
	include 'view/footer.php';
	?>	

	<script src="view/javascript.js"></script>

</body>