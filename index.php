<html>
<body>	

	<?php
	session_start();
	include 'model/db.php';
	include 'view/header.php';		
  include 'view/navigation.php'; 
	// $_SESSION["beep"] = 'boop';
      // session_unset(); 
      // session_destroy(); 
	?>

	<!-- content -->

<!-- title section -->
<div class="main">
<!-- <h1 class="header center">THE COMPLETIONIST</h1> -->
      <div class="row center">
        <h5 class="header col s12 light">For the gamer with too many unearned achievements and not enough time.</h5>
      </div>
      <div class="row center">        
        <a href="#register" id="download-button" class="btn btn-floating pulse">Register</a>
      </div>    
</div>

  <div class="row">
        <div id="info" class="col s12 m4 info">
          <div class="icon-block">
            <h2 class="center pink-text text-lighten-3"><i class="fas fa-exchange-alt"></i></h2>
            <h5 class="center">Ease of Achieving</h5>

            <p class="light">Have you ever had one, maybe two, achievements left til you completed a game entirely? Have those unearned trophies kept you up at night? Has the platinum trophy with a 3% ultra rare rating mocked you from afar? Then this service is for you! </p>
          </div>
        </div>

        <div class="col s12 m4 info">
          <div class="icon-block">
            <h2 class="center pink-text text-lighten-3"><i class="fas fa-clock"></i></h2>
            <h5 class="center">Your Time is Important</h5>

            <p class="light">By registering you'll be able to contact our working Completionist to get a quote for the game you want completed, securely and easily you'll send your chosen platforms account details and within 2-6 days that platinum will be yours.</p>
          </div>
        </div>

        <div class="col s12 m4 info">
          <div class="icon-block">
            <h2 class="center pink-text text-lighten-3"><i class="fas fa-user-secret"></i></h2>
            <h5 class="center">Privacy is Key</h5>

            <p class="light">Your privacy and personal details are of our utmost priority. All information given will be securely kept in our database and not given to any 3rd party provider. Your privacy and the manner that your trophies are earned is very important to us. </p>
          </div>
        </div>

      </div>

<?php
  if(isset($_POST['SubmitButton'])){ //check if form was submitted
  $input = $_POST['email']; //get input text
  $message = "Success! You entered: ".$input;
  echo 'beep';
}    
?>     

<!-- login modal -->
<div id="login" class="modal">
    <div class="modal-content">
  <div class="row">
    <form class="col s12" action="controller/login_check.php" method="post">
          <!-- <form class="col s12" action="" method="post"> -->
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>

              <!-- <input id="icon_prefix" type="text" class="validate"> -->
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
    </div>
      </div>
    </form>
  </div>
</div>
</div>

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