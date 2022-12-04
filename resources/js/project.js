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
            window.location.href = data.checkout_url;
          }
          else{
            // Note to future tell the user to login first.
            location.reload();
          }
      }
  });
});


// Ajax for posting project updates
$("#updateSubmit").click(function(){
  var form = $("#updateForm");
  var id = form.find('input[name="ProjectId"]').val();
  var title = form.find('input[name="UpdateTitle"]').val();
  var desc = form.find('textarea[name="UpdateDesc"]').val();
  
  if(form.valid() === true){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/updates/create",
      type:'post',
      data: {
        ProjectId : id,
        UpdateTitle : title,
        UpdateDesc : desc,
      },
      success: function(result){
          let data = JSON.parse(result);
          var update = data.update
          var options = {year: 'numeric', month: 'long', day: 'numeric' };
          let date  = new Date(update['created_at']);

          // Change the current update text
          document.getElementById("update-current-title").textContent = update['title']
          document.getElementById("update-current-date").textContent = `(${date.toLocaleDateString("en-US", options)})`
          document.getElementById("update-current-description").textContent = update['description']
          
          if (data.prevUpdateHTML){
            // Render progress list accordion for first time
            if (!document.getElementById("info-update-accordion")){
              var accordion = `
              <div class="accordion accordion-flush px-lg-5" id="info-update-accordion">
                <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                    <h2 class="font-weight-bold">Update List</h2>
                    <div id = "previous-update-accordion" > </div>
                </div>
              </div>`;

              document.getElementById("info-update-accordion").insertAdjacentHTML('afterend', accordion);
            }

            // Insert previous update list accordion
            $("#previous-update-accordion").prepend(data.prevUpdateHTML)
          } 
          form[0].reset();
          $("#updateModal").modal('hide');   
      }
    });
  }
});

$(".editUpdate").click(setModal)
$(".editCurrentUpdate").click(setModal)

function setModal(e){
  var updateType = $(e.target).attr('data-type');
  var id = $(e.target).attr('data-id');
 
  if(updateType == 'current'){
    var title = document.getElementById('update-current-title').textContent.trim()
    var desc = document.getElementById('update-current-description').textContent.trim()
  }
  else {
    var title = document.getElementById('update-title-'+id).textContent.trim()
    var desc = document.getElementById('update-desc-'+id).textContent.trim()
  }
  
  $('#updateEditId').val(id);
  $('#updateEditType').val(updateType);
  $('#updateEditTitle').val(title);
  $('#updateEditDesc').val(desc);
}

// Save comment edit
$('#updateEditSubmit').click(function(){
  let form = $('#updateEditForm')
  let type = $('#updateEditType').val()
  var id = $('#updateEditId').val()
  var title = $('#updateEditTitle').val()
  var desc = $('#updateEditDesc').val()

  if(form.valid() === true){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: "/updates/edit",
      type:'post',
      data: {
        UpdateId : id,
        UpdateTitle : title,
        UpdateDesc : desc,
      },
      success: function(){
        // Change the current update text
        if (type == 'current'){
          document.getElementById("update-current-title").textContent = title
          document.getElementById("update-current-description").textContent = desc
        }
        else {
          document.getElementById("update-title-" + id).textContent = title
          document.getElementById("update-desc-" + id).textContent = desc
        }
         
        $("#updateEditModal").modal('hide');
      
      }
    });
  } 
})

// Adjust textarea size
$("#comment-box").on('keydown', function(){
  var el = this;
  setTimeout(function(){
    el.style.cssText = 'padding:0';
    // for box-sizing other than "content-box" use:
    el.style.cssText = '-moz-box-sizing:content-box';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';
  },0);
});

// Submit comment on pressing enter
$('#comment-box').keypress(function(e) {
  var key =  e.which || e.keyCode;
  if(key == 13  && !e.shiftKey){
    e.preventDefault() // Prevent new line with just enter key

    var id = $('#ProjectId').val();
    var comment = e.target.value;
    
    $(e.target).val(''); // Clear the text field

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "/comments/project/create",
      type:'post',
      data: {
        ProjectId : id,
        ProjectComment : comment,
      },
      success: function(result){
          let data = JSON.parse(result);
          
          // Insert comment
          $("#commentsList").prepend(data.commentHTML)  
      }
    });
  }
   
}); 

// https://stackoverflow.com/a/26309195
// used event delegation for inserted html
$(document).on('click', '.edit', function(e){
  let id = $(e.target).attr('data-id')
  let comment = document.getElementById('comment-'+id).textContent
  
  // Prevents submiting the same comment
  $('#edit-comment-box').on('keyup',function(e){
    if (comment == e.target.value)
      $('.saveChanges').prop('disabled', true)
    else
      $('.saveChanges').prop('disabled', false)

  })
  
  $('#CommentId').val(id)
  $('#edit-comment-box').val(comment)
})

// Save comment edit
$('.saveChanges').click(function(){
  let form = $('#editForm')
  let id = $('#CommentId').val()
  var comment = $('#edit-comment-box').val()

  if(form.valid() === true){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
      url: "/comments/project/edit",
      type:'post',
      data: {
        CommentId : id,
        ProjectComment : comment,
      },
      success: function(result){
          let data = JSON.parse(result);

          // Insert comment
          document.getElementById('comment-'+id).textContent = comment  
          document.getElementById('comment-'+id+'-date').textContent = data.commentDate + ' (Edited)' 

          $("#editModal").modal('hide');
      
      }
    });
  } 
})

$(document).on('click', '.delete', function(e){
  let id = $(e.target).attr('data-id')
  let comment = $("#project-comment-" + id).html()

  $('#deleteCommentId').val(id)
  $('#commentPreview').html(comment)
})


// Confirm comment delete
$('.confirmDelete').click(function(){
  let id = $('#deleteCommentId').val()

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
      }
  });
  $.ajax({
    url: "/comments/project/delete",
    type:'post',
    data: {
      CommentId : id,
    },
    success: function(result){
      let data = JSON.parse(result);
      
      if (data.response == "success"){
        // Delete comment
        console.log(id)
        document.getElementById('project-comment-'+id).remove()
        
        $("#deleteModal").modal('hide');
      }
    }
  });
  
})

$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});