// debug switch
function switchfunction() {
    var x = document.getElementById("debug");
    if (x.style.display === "none") {
        x.style.display = "block";
        localStorage.setItem('debugswitch', 'on');
    } else {
        x.style.display = "none";
        localStorage.setItem('debugswitch', 'off');
    }
}

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
      PaymentDate: "required",
      PaymentAmount: "required",
      TimeGiven: {
        required: true
      },
      Status: {
        required: true
      }
    },
    messages: {
      PaymentDate: "Please enter valid date",
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

  $(document).ready(function(){
    $(".dropdown-trigger").dropdown();
  });

   $(document).ready(function(){
    $('.sidenav').sidenav();
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

$(document).ready(function(){
    // $('.tooltipped').tooltip({delay: 50}); 
    // $(".button-collapse").sideNav();
    $('.modal').modal();
    $('select').formSelect();
    $('.scrollspy').scrollSpy();
    // $('.sidenav').sidenav();
    // $('select').material_select();
    // $('.dropdown-trigger').dropdown();
    // $('.dropdown-button').dropdown();
    // $('.carousel').carousel();
    // $('.scrollspy').scrollSpy();
});

console.log("beep");

function register() {
$('#login').modal();
$('#register').modal();
};

 $(document).ready(function(){
    $('.carousel').carousel();
  });
