$(document).ready(function(){
    // $('.tooltipped').tooltip({delay: 50}); 
    $('.modal').modal();
    $('select').formSelect();
    $('.scrollspy').scrollSpy();
    $('.sidenav').sidenav();
    // $('select').material_select();
    $('.dropdown-trigger').dropdown();
});

 $(document).ready(function(){
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      defaultDate: '5/05/2018',
      setDefaultDate: true,
    },      
      );
  });

function buttonfunction() {
  settingsbutt.style.pointerEvents = "auto";
  settingsbutt.style.cursor = "pointer";
  settingsbutt.style.opacity = "0.8";
  // settingsbutt.style.display = 'block';
  // settingsbutt.removeAttribute('style');
}

// remember checkbox into localStorage        
$(document).ready(function(){
    
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

  });

// debug switch
// function switchfunction() {
//     var x = document.getElementById("debug");
//     if (x.style.display === "none") {
//         x.style.display = "block";

//         localStorage.setItem('debug', 'block');
//     } else {
//         x.style.display = "none";

//         localStorage.setItem('debug', 'none');
//     }
// }

// function debugOn() {
//   settings.style.display = "block";
// }

// function debugOff() {
//   debug.style.display = "block";
// }


// remember debug switch 
// if (typeof(Storage) !== "undefined") {
//     // store
//     localStorage.setItem("state", "none");
//     // retrieve
//     document.getElementById("debug").innerHTML = localStorage.getItem("state");
// } else {
//     document.getElementById("debug").innerHTML = "browser does not support Web Storage";
// }

        // settings - change accent color
//   localStorage.setItem('color', 'red');
//   localStorage.getItem('color');

// validation
$(function() {
  $("form[name='registration']").validate({
    rules: {
      Date: "required",
      PaymentAmount: "required",
      TimeGiven: {
        required: true
      },
      Status: {
        required: true
      }
    },
    messages: {
      Date: "Please enter valid date",
      Status: "Please enter valid status",
      PaymentAmount: "Please enter valid amount",
      TimeGiven: {
        required: "Please enter valid time"
      },
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

  // $('.dropdown-button').dropdown({
  //          inDuration: 300,
  //          outDuration: 225,
  //          constrain_width: true, 
  //          hover: false, 
  //          gutter: 0, 
  //          belowOrigin: false 
  //          }
  //     );

console.log("beep");

function register() {
$('#login').modal();
$('#register').modal();
};

function login() {
$('#login').modal();
};

 $(document).ready(function(){
    $('.carousel').carousel();
  });
