<body>

  <?php
// include 'header.php';   
// redirect to root folder
$PHP_SELF=$_SERVER['PHP_SELF'];
$Root='http://'.$_SERVER['HTTP_HOST'].'/completionist'.substr($PHP_SELF,0,strrpos($PHP_SELF,''));

if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Admin') {
    ?>
    <style>.administrator { display: inherit;}</style>
    <style>.user { display: none !important;}</style>
    <style>.both { display: inherit;}</style>

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
    <style>.both { display: inherit;}</style>

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
   <style>.both { display: none;}</style>

   <style>.log { display: inherit;}</style>
   <style>.contact {display: none !important;}</style>
   <style>.submitupdate { display: none;}</style>    
   <?php
}

?>

<?php echo'

<ul id="dropdown1" class="dropdown-content">
<li><a class="both" href=" ';
echo $Root;
echo '/view/Settings.php"><i class="material-icons left">account_circle</i>
Settings</a></li>

<li><a class="user" href=" ';
echo $Root;
echo '/view/ActiveRequests.php"><i class="material-icons left">account_circle</i>
Your Contracts</a></li>

<li><a class="both" href=" ';
echo $Root;
echo '/controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>
</ul>

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">

      <a href=" ';
      echo $Root;
      echo '/index.php" class="brand-logo">The Completionist</a>';
      echo'<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

<ul class="right hide-on-med-and-down">

      <li><a class="log modal-trigger" href="#login"><i class="material-icons left">account_circle</i>Login</a></li>';
      echo'

      <li><a href=" ';
      echo $Root;
      echo '/view/AdminProfile.php"><i class="material-icons left">info_outline</i>About</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/ActiveRequests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>';

$email = $_SESSION['CurrentUser'];

      echo' 

     <li><a class="user" href=" ';
      echo $Root;
      echo '/view/Submit.php"><i class="material-icons left">add_circle_outline</i>Submit Contract</a></li>';
      echo '

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/Contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>
      <li><a class="both dropdown-trigger" data-target="dropdown1"><i class="material-icons left">account_circle</i>
      Welcome ' . $email . '!
      <i class="material-icons right">arrow_drop_down</i></a></li>    
    </ul>
    </div>
    </nav>
    
<ul class="sidenav" id="mobile-demo">

      <li><a class="log modal-trigger" href=" ';
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

<script>
  $(document).ready(function(){
    $(".dropdown-trigger").dropdown();
  });
</script> 

<script>
function register() {
$('#login').modal();
$('#register').modal();
};
</script>  
