$(document).ready(function(){
    // $('.tooltipped').tooltip({delay: 50}); 
    $(".button-collapse").sideNav();
    $('.modal').modal();
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