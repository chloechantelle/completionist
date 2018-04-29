<?php	
session_start();
include '../model/db.php';  
include 'header.php';
include 'navigation.php';
?>	
<style><?php include '../view/style.css';?></style>	
<script src="../view/javascript.js"></script>


  <div class="row">
    <div class="settings right col s12 m9 l10">
      <div id="1" class="section scrollspy">
        <h1>Debugging</h1>
  
  <form action="../controller/settings_process.php" method="post">

<div id="checkbox-container">

  <div class="switch">
    <label for="option1">Off
    <input onclick="switchfunction()" type="checkbox" id="option1">
    <span class="lever"></span>
    On
  </label>
  </div>
</div>

<!-- <div id="debugg">
This is my DIV element.
</div> -->

        <p>Show or hide the debugging information at the bottom of the page.</p>
      </div>

<div class="submit">
 <input class="btn" type="submit" name="submit" value="Save changes">
</div>      

</form>

      <div id="2" class="section scrollspy">
        <h1>Option 2</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
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
        <li><a href="#1">Option 1</a></li>
        <li><a href="#2">Option 2</a></li>
        <li><a href="#3">Option 3</a></li>
      </ul>
    </div>
  </div>
        
<!-- remember checkbox into localStorage         -->
<script>
var formValues = JSON.parse(localStorage.getItem('formValues')) || {};
var $checkboxes = $("#checkbox-container :checkbox");
var $button = $("#checkbox-container button");

function allChecked(){
  return $checkboxes.length === $checkboxes.filter(":checked").length;
}

function updateButtonStatus(){
  $button.text(allChecked()? "Uncheck all" : "Check all");
}

function handleButtonClick(){
  $checkboxes.prop("checked", allChecked()? false : true)
}

function updateStorage(){
  $checkboxes.each(function(){
    formValues[this.id] = this.checked;
  });

  formValues["buttonText"] = $button.text();
  localStorage.setItem("formValues", JSON.stringify(formValues));
}

$button.on("click", function() {
  handleButtonClick();
  updateButtonStatus();
  updateStorage();
});

$checkboxes.on("change", function(){
  updateButtonStatus();
  updateStorage();
});

// On page load
$.each(formValues, function(key, value) {
  $("#" + key).prop('checked', value);
});

$button.text(formValues["buttonText"]);
</script> 

<?php
			include '../view/footer.php';
?>	