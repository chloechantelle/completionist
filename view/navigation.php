<body>

<script src="../view/javascript.js"></script>

  <?php
// include 'header.php';   
// redirect to root folder
$PHP_SELF=$_SERVER['PHP_SELF'];
$Root='http://'.$_SERVER['HTTP_HOST'].'/completionist'.substr($PHP_SELF,0,strrpos($PHP_SELF,''));


// if is checked
if (isset($_SESSION['Debug']) && $_SESSION['Debug'] == 'On') {
// show debug
?>
<style>  
#debug { display: block;}
</style>
<?php  
// debugOn();
// console.log('on');
}
else {
// hide debug
?>
<style>  
#debug { display: none;}
</style>
<?php
// debugOff();
// console.log('off');
}

if (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Admin') {
    ?>

  <style>
    .administrator { display: inherit;}
    .user { display: none !important;}
    .both { display: inherit;}

    .contact {display: inherit;}
    .log { display: none !important; }
    .submitupdate { display: inherit;}    
    .submitpay { display: none;}   

    #download-button {display: none;}
  </style> 

    <?php
    $email = $_SESSION['CurrentUser'];
    $avi = $_SESSION['Avi'];
}
elseif (isset($_SESSION['Role']) && $_SESSION['Role'] == 'Customer') {
    ?>
    <style>
    .administrator { display: none !important; }
    .user { display: inherit !important;}
    .both { display: inherit !important;}

    .contact {display: inherit;}
    .log { display: none;}
    .submitupdate { display: none;}   
    .submitpay { display: inherit;}  

    #download-button {display: none;}
  </style>

    <?php
    $email = $_SESSION['CurrentUser'];    
    $avi = $_SESSION['Avi'];
}
else {
   ?>

   <style>
   .administrator { display: none !important; }
   .user { display: none !important;}
   .both { display: none !important;}
 
   .log { display: inherit;}
   .contact {display: none !important;}
   
   .submitupdate { display: none;}
   .submitpay { display: none;}    
 </style>    

   <?php
   $email = null;
   $avi = null;
}

?>

<?php echo'


<ul id="dropdown1" class="dropdown-content">
<li><a class="both" href=" ';
echo $Root;
echo '/view/settings.php"><i class="material-icons left">account_circle</i>
Settings</a></li>

<li class="user"><a href=" ';
echo $Root;
echo '/view/requests.php"><i class="material-icons left">account_circle</i>Your Contracts</a></li>

<li class="administrator"><a href=" ';
      echo $Root;
      echo '/view/requests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>';
echo'      

<li><a class="both" href=" ';
echo $Root;
echo '/controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>
</ul>



<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">

      <a href=" ';
      echo $Root;
      echo '/index.php" class="brand-logo"><img class="logo" src=" ';
      echo $Root;
      echo '/logo.png"></a>';
      echo'<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

<ul class="right hide-on-med-and-down">

      <li><a class="log modal-trigger" href="#login"><i class="material-icons left">account_circle</i>Login</a></li>';
      echo'

      <li><a href=" ';
      echo $Root;
      echo '/view/about.php"><i class="material-icons left">info_outline</i>About</a></li>';
      echo' 

     <li><a class="user" href=" ';
      echo $Root;
      echo '/view/submit.php"><i class="material-icons left">add_circle_outline</i>Submit Contract</a></li>';
      echo '

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>

      <li><a class="both dropdown-trigger" data-target="dropdown1">
      <img alt="" class="left avi" src=" ' . $avi . ' ">
      Welcome ' . $email . '!
      <i class="material-icons right">arrow_drop_down</i></a></li>  

    </ul>
    </div>
    </nav>
    
<ul class="sidenav" id="mobile-demo">

      <li><a class="log modal-trigger" href="#login"><i class="material-icons left">account_circle</i>Login</a></li>';
      echo'

      <li><a href=" ';
      echo $Root;
      echo '/view/about.php"><i class="material-icons left">info_outline</i>About</a></li>';
      echo' 

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/about.php"><i class="material-icons left">event_note</i>Active Requests</a></li>';

      echo' 

     <li><a class="user" href=" ';
      echo $Root;
      echo '/view/submit.php"><i class="material-icons left">add_circle_outline</i>Submit Contract</a></li>';
      echo '

      <li><a class="administrator" href=" ';
      echo $Root;
      echo '/view/contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>


     

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
