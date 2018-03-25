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
    // $('.tooltipped').tooltip({delay: 50}); 
    $(".button-collapse").sideNav();
    $('.modal').modal();
    $('select').material_select();
    // $('.scrollspy').scrollSpy();
});

console.log("beep");

$(window).on('scroll',function(){
     if ($(window).scrollTop() >= 50) {
         $('.navbar').css({
          'background' : '#fff',
          'color' : '#111',
         });
         $('.navbar li a').css({
          'color' : '#111',
          'padding' : '20px',
         });  
     } else {
         $('.navbar').css({
             'background' : 'transparent',
             'color' : '#fff',
         });
         $('.navbar li a').css({
          'color' : '#fff',
          'padding' : '30px',
         });  
     }
 });


function register() {
$('#login').modal('close');
$('#register').modal('open');
}