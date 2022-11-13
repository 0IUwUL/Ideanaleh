// progress bar
window.onload = function() {progressBar()};
window.onscroll = function() {progressBar()};
  function progressBar() {
      var docuScroll = document.body.scrollTop || document.documentElement.scrollTop;
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      var scrolled = (docuScroll / height) * 100;
      document.getElementById("progress-bar").style.width = scrolled + "%";
  }

  var widths = $(window).outerWidth();

  $('.progress-bar div').css({
      width: widths,
  });

$(document).ready(function () {
    $(".images-carousel").owlCarousel({
      loop: true,
      margin:10,
      nav: true,
      navText: ["<div class='nav-button owl-prev'><i class='fa-solid fa-arrow-left'></i></div>", "<div class='nav-button owl-next'><i class='fa-solid fa-arrow-right'></i></div>"],
      items: 1,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });
  
    $('.owl-nav').width($('.owl-dots').width() * 2.5);
  });


  $('img[img-zoom]').addClass('img-zoom').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'rgba(0,0,0,0.5) url('+src+') no-repeat center',
        backgroundSize: '75% 75%',
        width:'100%', 
        height:'100%',
        position:'fixed',
        zIndex:'9999',
        top:'0', 
        left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});