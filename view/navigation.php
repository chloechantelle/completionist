<body>

  <?php

// redirect to root folder
$PHP_SELF=$_SERVER['PHP_SELF'];
$Root='http://'.$_SERVER['HTTP_HOST'].'/completionist'.substr($PHP_SELF,0,strrpos($PHP_SELF,''));

if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Admin') {
    ?>
    <style>.administrator { display: inherit;}</style>
    <style>.user { display: inherit;}</style>
    <style>.contact {display: inherit;}</style>
    <style>.log { display: none !important; }</style>
    <style>.submitupdate { display: inherit;}</style>    
    <style>#download-button {display: none;}</style>

    <?php
}
elseif (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Customer') {
    ?>
    <style>.administrator { display: none; }</style>
    <style>.user { display: inherit;}</style>
    <style>.contact {display: inherit;}</style>
    <style>.log { display: none;}</style>
    <style>.submitupdate { display: none;}</style>   
    <style>#download-button {display: none;}</style> 

    <?php
}
else {
   ?>
   <style>.administrator { display: none !important; }</style>
   <style>.user { display: none;}</style>
   <style>.log { display: inherit;}</style>
   <style>.contact {display: none !important;}</style>
   <style>.submitupdate { display: none;}</style>    
   <?php
}

?>

<?php echo'

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">

      <a href=" ';
      echo $Root;
      echo '/index.php" class="brand-logo">The Completionist</a>';
      echo' 
      
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">

      <li><a class="log" href="#login"><i class="material-icons left">account_circle</i>Login</a></li>';
      echo'

      <li><a href=" ';
      echo $Root;
      echo '/view/AdminProfile.php"><i class="material-icons left">account_circle</i>Completionist</a></li>';
      echo' 

      <li><a class="user" href=" ';
      echo $Root;
      echo '/view/ActiveRequests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/Contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/UpdateContract.php"><i class="material-icons left">update</i>Update Contract</a></li>';
      echo' 

      <li><a class="user" href=" ';
      echo $Root;
      echo '/controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>';
      echo' 

      </ul>
    </div>

    <!-- mobile -->
<ul class="side-nav" id="mobile-demo">

      <li><a class="log" href=" ';
      echo $Root;
      echo '/index.php#login"><i class="material-icons left">account_circle</i>Login</a></li>';
      echo'

      <li><a href=" ';
      echo $Root;
      echo '/view/AdminProfile.php"><i class="material-icons left">account_circle</i>Completionist</a></li>';
      echo' 

      <li><a class="user" href=" ';
      echo $Root;
      echo '/view/ActiveRequests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/Contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/UpdateContract.php"><i class="material-icons left">update</i>Update Contract</a></li>';
      echo' 

      <li><a class="user" href=" ';
      echo $Root;
      echo '/controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>';
      echo' 


      </ul>
  </nav>
</div>  
'?>
