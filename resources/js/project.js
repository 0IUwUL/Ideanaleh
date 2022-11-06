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