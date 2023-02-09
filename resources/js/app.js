import './bootstrap';

import '../sass/app.scss';
import { conformsTo, templateSettings } from 'lodash';

const into = document.querySelector('.toast-body')

$(document).ready(function(){
    var data = $('#modeToast').attr('data-mode')
    if(data == 3){
        $('#SignUpModal5').modal('show');
    }
    var form = $("#ProjForm");
    var tagValues = form.find('input[name="Tags[]"]');
    if(tagValues){
        Object.values(tagValues).forEach(input => {
            if(input.value != null)
                tags.push(input.value);
        })
    }
    
    // Alerts restricted user that logins via Google
    if($('#DevToast').attr('data-status') == 'show'){
        $('.toast-container').addClass('position-fixed bottom-0 end-0')
        $('.toast-header').addClass('bg-danger text-white')

        into.textContent = `Your account is restricted from logging in` 

        $('#DevToast').toast('show');
    }
});

// function for loading
$( window ).on( "load", function() {
    $('.load').fadeOut("slow");
    $('.page_content').fadeIn("slow");
});

//temporary fix for submit form on enter
$(document).on("keydown", ":input:not(textarea):not(:submit)", function(event) { 
    return event.key != "Enter";
});

// Validate registration form for Normal Auth
$('.next, #submit').click(function (){
    var form = $("#myForm");
    form.validate({
        rules: {
            'Categs[]': {
                required: true,
                minlength: 3,
            },
            'Followed[]': {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            rePassword: {
                equalTo: "Password doesn't match",
            },
            'Categs[]': {
                required: "You must check at least 3 categories",
                minlength: "Check at least {0} categories"
            },
            'Followed[]': {
                required: "You must follow at least 3 projects",
                minlength: "Check at least {0} projects"
            },
        }
    });

    if (form.valid() === true){
        if ($('#SignUpModal').is(":visible")){
            $('#SignUpModal').modal('hide');
            $('#SignUpModal2').modal('show');

        }else if ($('#SignUpModal2').is(":visible")){
            var email = document.getElementById("email").value;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/verify-email",
                type:'post',
                data: {
                    email : email,
                },
                success: function(result){
                    let data = JSON.parse(result);

                    if (data.response == 'duplicate')
                        document.getElementById('dupli').innerHTML = "* Email is already registered"
                    else{
                        $('#SignUpModal2').modal('hide');
                        $('#SignUpModal3').modal('show');
                    }
                }

            });
        }else if ($('#SignUpModal3').is(":visible")){
            $('#SignUpModal3').modal('hide');
            // getting categories checked
            let cate = [];
            var max = form.find('input[name="Categs[]"]:checked')
            Object.values(max).forEach(categs => {
                if(categs.value)
                    cate.push(categs.value)
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/project/categs",
                type:'post',
                data: {
                    categs : cate,
                },
                success: function(result){
                    let data = JSON.parse(result);
                    // inserting to html
                    $('#Category_content').html(data.item)
                    $('#SignUpModal4').modal('show');
                }
            });
        }
    }

});

// Google Auth
$('.Gnext, #Gsubmit').click( function(){
    var form = $("#GoogleForm");
    form.validate({
        rules: {
            'GCategs[]': {
                required: true,
                minlength: 3,
            },
            'Followed[]': {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            'GCategs[]': {
                required: "You must check at least 3 categories",
                minlength: "Check at least {0} categories"
            },
            'Followed[]': {
                required: "You must follow at least 3 projects",
                minlength: "Check at least {0} projects"
            },
        }
    });

    if (form.valid() === true){
        $('#SignUpModal5').modal('hide');
        $('#SignUpModal6').modal('show');
        if ($('#SignUpModal5').is(":visible")){
            // getting categories checked
            let cate = [];
            var max = form.find('input[name="GCategs[]"]:checked')
            Object.values(max).forEach(categs => {
                if(categs.value)
                    cate.push(categs.value)
            })
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/project/categs",
                type:'post',
                data: {
                    categs : cate,
                },
                success: function(result){
                    let data = JSON.parse(result);
                    // inserting to html
                    $('#GCategory_content').html(data.item)
                }
            });
        }
    }
});

jQuery(document.body).on('click', '.btn_follow', function(e){
    var btnClass = $(e.target).parent();
    if (btnClass.hasClass('followed')){
        btnClass.removeClass('followed')
    }else{
        btnClass.addClass('followed')
    }
  });

// Activate Toast
$("#modeToast, #modeToast2, #modeToast3, #modeToast4").on("click",  function(){
    var c = $("#modeToast").data('id');
    var insert
    if (c == 'logO' || c == 'logI'){
        var mode = $(this).attr('data-mode');
        console.log(mode)
        $('.toast-container').addClass('position-fixed bottom-0 end-0')
        $('.toast-header').addClass('bg-danger text-white')
        if (mode && c == 'logI'){
            insert = `Verify your email in the settings.`
            $(this).removeAttr('href')
        }else{
            insert = `Register or Log In first`
        }
        into.innerHTML = insert
        $('.DevToast').toast('show');
    }
})

// Show registration modal
$("#register").on("click", function (){
    $('#LoginModal').modal('hide');
    $('#SignUpModal').modal('show');
})

// Show login modal
$("#login").on("click", function(){
    $('#LoginModal').modal('show');
    $('#SignUpModal').modal('hide');
});

$('#LoginSubmit').on("click", function(){
    var email = document.getElementById("InputEmail").value;
    var pass = document.getElementById("InputPassword").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/verify-log",
        type:'post',
        data: {
            email : email,
            pass : pass,
        },
        success: function(result){
            let data = JSON.parse(result);

            if (data.response == 'err_pass'){
                document.getElementById('err_pass').innerHTML = "* Incorrect password"
            } else if (data.response == 'err_mail')
                document.getElementById('err_mail').innerHTML = "* Email is not yet registered"
            else if (data.response == 'err_acc')
                document.getElementById('err_pass').innerHTML = "* Sorry, your account is restricted from logging in due to being deactivated"
            else
                document.getElementById("LogInForm").submit();
        }

    });
});

// Rendering the google button
$('#LoginModal, #SignUpModal').on('show.bs.modal', function (e) {
    var btn = $(e.target).attr('data-btn');

    google.accounts.id.renderButton(
        document.getElementById(btn),
        { theme: "outline", size: "large", text: "continue_with"}  // customization attributes
    );
});

$('.prog_tabs a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {

    var target = $(e.target).attr('data-bs-target');
    var $curr = $(".prog_tabs a[data-bs-target='" + target + "']");
    $('.prog_tabs a').removeClass('done');
    $('.prog_tabs .arrow').removeClass('done');
    $curr.prevAll().addClass("done");
    if(target == '#nav-basic')
        $('.progress-bar').css('width', '25%')
    if(target == '#nav-reward')
        $('.progress-bar').css('width', '50%')
    if(target == '#nav-story')
        $('.progress-bar').css('width', '75%')
    if(target == '#nav-payment')
        $('.progress-bar').css('width', '100%')
});

function Next(e){
    var btn = $(e.target).attr('data-next');
    $('#nav-'+btn+'-tab').tab('show');
}

$('textarea').keyup(function () {
    var max = 200
    var tlength = $(this).val().length;
    $(this).val($(this).val().substring(0, max));
    var tlength = $(this).val().length;
    $('#limit').text(tlength);
});


$.validator.addMethod('yey', function (value, element, param) {
    var given
    if (parseFloat($(param).val()) == NaN)
        given = 0
    else
        given = parseFloat($(param).val())

    if (this.optional(element) || parseFloat(value) >  given)
        return true;
}, 'Invalid value');

// DetValid - Validate user details
$('.tab_next').on('click',function (e){
    var form = $("#ProjForm");
    var logo = $(e.target).attr('id');
    var btn = $(e.target).attr('data-next')

    form.validate({

        focusCleanup: true,
        rules:{
            "Tier[1][amount]": {
                yey: '#Tier_1_amount',
            },
            "Tier[2][amount]": {
                yey: '#Tier_2_amount',
            },
            ProjTarget :{
                yey: '#floatingMileStone',
            }
        },
        messages: {
            ProjTarget: {
                range: "Target must me greater than 100!",
                yey: '*Input must be greater than the Project milestone',
            },
            ProjMilestone: {
                range: "Target must me greater than 100!",
            },
            "Tier[0][name]": {
                required: "Tier title input is required",
            },
            "Tier[1][name]": {
                required: "Tier title input is required",
            },
            "Tier[0][amount]": {
                required: "Tier amount input is required",
                range : "Amount must be greater than 100."
            },
            "Tier[1][amount]": {
                required: "Tier amount input is required",
                range : "Amount must be greater than 100.",
                yey : 'Input must be greater than the previous tier/s.',
            },
            "Tier[2][amount]": {
                required: "Tier amount input is required",
                range : "Amount must be greater than 100.",
                yey : 'Input must be greater than the previous tier/s.',
            },
        },

    });

    if (form.valid() === true){
        var max = form.find('input[name="Tags[]"]')
        if(max.length >= 3){
            if (logo == 'nav-basic-tab' || btn == 'reward'){
                $('#nav-reward-tab').removeClass('disabled');
                $('#nav-reward-tab').attr("data-bs-target", '#nav-reward')
            }
            if (logo == 'nav-reward-tab' || btn == 'story'){
                $('#nav-story-tab').removeClass('disabled');
                $('#nav-story-tab').attr("data-bs-target", '#nav-story')
            }
            if (logo == 'nav-story-tab' || btn == 'payment'){
                $('#nav-payment-tab').removeClass('disabled');
                $('#nav-payment-tab').attr("data-bs-target", '#nav-payment')
            }
            Next(e);
        }else{
            input_tags.focus();
        }
    }else{
        if (logo == 'nav-basic-tab' || btn == 'reward'){
            $('#nav-reward-tab').addClass('disabled');
            $('#nav-reward-tab').attr("data-bs-target", '')
        }
        if (logo == 'nav-reward-tab' || btn == 'story'){
            $('#nav-story-tab').addClass('disabled');
            $('#nav-story-tab').attr("data-bs-target", '')
        }
        if (logo == 'nav-story-tab' || btn == 'payment'){
            $('#nav-payment-tab').addClass('disabled');
            $('#nav-payment-tab').attr("data-bs-target", '')
        }
    }
})

$('#options').on('change', function(){
    var category = $('#category option:selected').val()
    var options = $('#options option:selected').val()   
    var page = null
    filterSend(category, options, page)
})

$('#category').on('change', function(){
    var category = $('#category option:selected').val()
    var options = $('#options option:selected').val()
    var page = null
    filterSend(category, options, page)
})

function filterSend(category, option, page){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/main/filter",
        type:'post',
        data: {
            category: category,
            option : option,
            page: page,
        },
        success: function(result){
            let data = JSON.parse(result);
            $('#content_projects').html(data.item)
            $('#links').html(data.link)
        }

    });
}

$(document).on('click', '.pagination .page-link', function(event){
    var category = $('#category option:selected').val()
    var options = $('#options option:selected').val()
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    filterSend(category, options, page)
});


// Show registration modal
$("#forgot_password").on("click", function (){
    $('#LoginModal').modal('hide');
    $('#ForgotPasswordModal').modal('show');
})

var recover_email
$('#search').on("click", function(e){
    $(e.target).prop('disabled', true)
    recover_email = document.getElementById("recover_email").value;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/search-email/",
        type:'POST',
        data: {
            email : recover_email,
        },
        success: function(result){
            $(e.target).prop('disabled', false)
            let data = JSON.parse(result);

            if (data.response == 'success'){
                $('#ForgotPasswordModal').modal('hide');
                $('#ForgotPasswordModal2').modal('show');
            }
            else{
                document.getElementById("recover_email").value = ''
                document.getElementById('errorSearch').innerHTML = "* Email is not found"  
            }
        }

    });
    
});

$('#verify').on("click", function(e){
    $(e.target).prop('disabled', true)
    var code = document.getElementById("code").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/verify-code",
        type:'POST',
        data: {
            email: recover_email,
            code: code,
        },
        success: function(result){
            $(e.target).prop('disabled', false)
            let data = JSON.parse(result);

            if (data.response == 'success'){
                $('#ForgotPasswordModal2').modal('hide');
                $('#ForgotPasswordModal3').modal('show');
            }
            else{
                document.getElementById("code").value = ''
                document.getElementById('errorCode').innerHTML = "* Incorrect verification code"  
            }
        }
    });
});

$("#save").on("click", function(){
    var form = $("#ForgotPasswordForm3");

    form.validate({
        rules:{
            newPass: {
                required:true,
            },
            confirmPass: {
                required:true,
            },    
        },
        messages: {
            confirmPass: {
                equalTo: "Doesn't match with new password",
            },
        }
    });

    if (form.valid() === true){
        $('#user_email').val(recover_email)
        form.submit()
    }
}); 

// search
jQuery(document.body).on('click', '.suggest', function(e){
    window.location = $('a', this).attr('href');
    return false;
});

$('input[name="search"]').on('keyup', function(e){
    if(e.target.value){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/main/search/suggestion",
            type:'POST',
            data: {
                input : e.target.value
            },
            success: function(result){
                let data = JSON.parse(result);
                console.log(data.item)
                $('.auto-com_box').html(data.item)
            }
        });
        $('.auto-com_box').addClass('active')
    }else
        $('.auto-com_box').removeClass('active')
})

$('#CloseSearch').on('click', function(){
    $('.auto-com_box').removeClass('active')
})

// fade in out
const observer = new IntersectionObserver(entries => 
    entries.forEach(entry => 
      entry.target.classList.replace(
        entry.isIntersecting ? 'fadeOut' : 'fadeIn', 
        entry.isIntersecting ? 'fadeIn' : 'fadeOut'
      )
    ), {root: null, rootMargin: "0px", threshold: 0.1}
  );
  
 document.querySelectorAll('.box').forEach(el => observer.observe(el));
 document.querySelectorAll('.hero__title').forEach(el => observer.observe(el));
 document.querySelectorAll('.user-profile').forEach(el => observer.observe(el));