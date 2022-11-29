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
      loop: false,
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

// Ajax for Follow and Unfollow functionality
$("#FollowUnfollowButton").click(function(e){
  // var form = $("#FollowUnfollowForm");
  // var id = document.getElementById("ProjectId").value
  var id = $(e.target).attr('data-projectId');

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
      url: "/user-preference/follow/",
      type:'post',
      data: {
        ProjectId : id,

      },
      success: function(result){
          let data = JSON.parse(result);
          console.log(data);
          if(data.response == "followed") {
            // console.log(data);
            document.getElementById('FollowUnfollowButton').innerHTML = '<span class="fa-regular fa-heart"></span>&nbsp Unfollow';
          }else {
            document.getElementById('FollowUnfollowButton').innerHTML = '<span class="fa fa-heart"></span>&nbsp Follow';
          }
      }
  });
});

$("#AmtDonate").click(function(){
  var amount = $('#FormControlAmt').val()  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
      url: "/payment/valid/",
      type:'post',
      data: {
        TierAmount : amount,
      },
      success: function(result){
          let data = JSON.parse(result);
          if(data.response == "success") {
            $('#FormControldisplayAmt').val(amount - (parseFloat(amount)*0.025))
            $('#displayAmt').modal('show');
            $('#amtModal').modal('hide');
          }else {
            document.getElementById('err_donation').innerHTML = "* Donation must be greater than 100."
          }
      }
  });
});

// Ajax for Follow and Unfollow functionality
$(".tier-button").click(function(e){
  var id = $(e.target).attr('data-projectId');
  var amount_var = $('#FormControlAmt').val();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
      url: "/payment/create/source/",
      type:'post',
      data: {
        ProjectId : id,
        TierAmount : amount_var,
      },
      success: function(result){
          let data = JSON.parse(result);
          if(data.response == "success") {
            window.open(data.checkout_url);
          }
      }
  });
});


// Ajax for posting project progress
$("#progressSubmit").click(function(){
  var form = $("#progressForm");
  var id = form.find('input[name="ProjectId"]').val();
  var title = form.find('input[name="ProgressTitle"]').val();
  var desc = form.find('textarea[name="ProgressDesc"]').val();
  
  if(form.valid() === true){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/progress/create",
      type:'post',
      data: {
        ProjectId : id,
        ProgressTitle : title,
        ProgressDesc : desc,
      },
      success: function(result){
          let data = JSON.parse(result);
          var progress = data.progress
          var options = {year: 'numeric', month: 'long', day: 'numeric' };
          var date  = new Date();

          // Change the current progress text
          document.getElementById("progress-current-title").textContent = `${progress[0]['title']} (${date.toLocaleDateString("en-US", options)})`
          document.getElementById("progress-current-description").textContent = progress[0]['description']

          // Progress will be 2 if its not the first progress posted
          if (progress.length == 2){
            // Render progress list accordion
            if (!document.getElementById("info-progress-accordion")){
              var accordion = `
              <div class="accordion accordion-flush px-lg-5" id="info-progress-accordion">
                <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                    <h2 class="font-weight-bold">Progress List</h2>
                    <div id = "previous-progress-accordion" > </div>
                </div>
              </div>`;
              document.getElementById("info-update-accordion").insertAdjacentHTML('afterend', accordion);
            }
      
            var proj_id = progress[1]['proj_id']
            var accordionItem = `
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#info-progress-acord-${proj_id}" aria-expanded="false" aria-controls="info-progress-acord-{{$i}}">
                  <h4 class="accordion-header" id="progress-acord-heading${proj_id}"></h4>
                </button>
                <div id="info-progress-acord-${proj_id}" class="accordion-collapse collapse"
                aria-labelledby="progress-acord-heading${proj_id}" data-bs-parent="#info-progress-accordion">
                    <div class="accordion-body py-2" id="progress-acord-desc${proj_id}"></div>
                </div>
              </div>`
            // Insert the format for previous item at the top of the list
            $("#previous-progress-accordion").prepend(accordionItem)
           
            // Then insert the string via text content to prevent XSS
            document.getElementById("progress-acord-heading" + proj_id).textContent =  `${progress[1]['title']} (${date.toLocaleDateString("en-US", options)})`
            document.getElementById("progress-acord-desc" + proj_id).textContent = progress[1]['description']

            $("#updateModal").modal('hide');
        }    
      }
    });
  }
});

// Adjus textarea size
$("#comment-box").on('keydown', function(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'padding:0';
    // for box-sizing other than "content-box" use:
    el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
});