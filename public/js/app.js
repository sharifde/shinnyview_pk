$(document).ready(function () {
  $('button[data-enable="privacy"]').prop('disabled',true);
  $('#mobile-menu-switch').click(function () {
    $('.mainMenu').addClass('act');
    $('body').addClass('overflow-hidden');
  });
  $('.cancel-popup-btn button').click(function(){
    $('.mainMenu').removeClass('act');
    $('body').removeClass('overflow-hidden');
  });
  $('.visible-password').click(function(){
    var target = $(this).parent().find('input');
    if(target.attr('type')=="text"){
      target.attr('type','password');
    }else{
      target.attr('type','text');
    }
  });
  $('#privacy_policy').change(function(){
    if($(this).prop('checked')==true){
      $('button[data-enable="privacy"]').prop('disabled',false);
    }else{
      $('button[data-enable="privacy"]').prop('disabled',true);
    }
  })
  $('.mega-dropdown-btn-main').on('mouseover',function(){
    var $positionEle = $(this).offset().left;
    $('.mega-dropdown-btn-content').css('padding-left',$positionEle+"px");
  })
  $('#password').change(function(){
   $('button[data-enable="privacy"]').prop('disabled',true);
  })
  $('#email').change(function(){
   $('button[data-enable="privacy"]').prop('disabled',true);
  })
  // var countDownDate = new Date("Febrary 15, 2022 00:00:00").getTime();
  // // Update the count down every 1 second
  // var x = setInterval(function () {

  //   // Get today's date and time
  //   var now = new Date().getTime();

  //   // Find the distance between now and the count down date
  //   var distance = countDownDate - now;

  //   // Time calculations for days, hours, minutes and seconds
  //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  //   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  //   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  //   // Output the result in an element with id="demo"
  //   document.getElementById("timer_days").innerHTML = days;
  //   document.getElementById("timer_hours").innerHTML = hours;
  //   document.getElementById("timer_min").innerHTML = minutes;
  //   document.getElementById("timer_sec").innerHTML = seconds;


  //   // If the count down is over, write some text
  //   if (distance < 0) {
  //     clearInterval(x);
  //     document.getElementById("timer_days").innerHTML = "EXPIRED";
  //   }
  // }, 1000);
});