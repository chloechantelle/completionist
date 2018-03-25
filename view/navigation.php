<body>

  <?php
$role_session = $_SESSION['Role'];

if($role_session == 'Customer') {
  ?>
  <style>
  .hidden { 
    display: none !important;
     }
     </style>
     <?php
}
else{
  ?><style>.hidden { display: inherit; }</style><?php
}
?>

<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper">
      <a href="../index.php" class="brand-logo">The Completionist</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li><a href="AdminProfile.php"><i class="material-icons left">account_circle</i>Completionist</a></li>

        <li><a href="ActiveRequests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>

        <li class="hidden"><a href="Contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>

        <li class="hidden"><a href="UpdateContract.php"><i class="material-icons left">update</i>Update Contract</a></li>

        <li><a href="../controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>


      </ul>
    </div>

    <!-- mobile -->
<ul class="side-nav" id="mobile-demo">

        <li><a href="view/AdminProfile.php"><i class="material-icons left">account_circle</i>Completionist</a></li>

        <li><a href="ActiveRequests.php"><i class="material-icons left">event_note</i>Active Requests</a></li>

        <li class="hidden"><a href="Contract.php"><i class="material-icons left">add_circle_outline</i>Create Contract</a></li>

        <li class="hidden"><a href="UpdateContract.php"><i class="material-icons left">update</i>Update Contract</a></li>

        <li><a href="../controller/logout_process.php"><i class="material-icons left">exit_to_app</i>Logout</a></li>


      </ul>

  </nav>
</div>  

