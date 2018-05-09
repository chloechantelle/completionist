<head>    
    <title>The Completionist</title>

<!-- broken -->
<link rel="icon" href="<?php echo $Root; ?>/favi.png">

    <link rel="icon" href="../favi.png">

    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="view/style.css">    -->
    <!-- <script src="view/javascript.js"></script>  -->
    <!-- jquery -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- loading screen jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- materialize framework -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <!-- materialize framework -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <!-- validate.js -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>      
    <!-- mobile detect -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/mobile-detect/1.4.1/mobile-detect.min.js"></script>


<div id="loading"></div>

<script>
$(window).load(function() {
  $("#loading").fadeOut(500);
})
</script>

<script type="text/javascript">
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    var element = document.getElementById('text');
    console.log(navigator.userAgent);
    if (isMobile) {
        console.log("On Mobile!");
    } else {
      console.log("On Desktop!");
    }
</script>

    <link rel="stylesheet" href="view/style.css">   
    <script src="view/javascript.js"></script> 
</head>
<main>      