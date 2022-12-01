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
    Object.values(tagValues).forEach(input => {
        if(input.value != null)
            tags.push(input.value);
    })
    console.log("tags ito");
    console.log(tags);
});

// function for loading
$( window ).on( "load", function() {
    $('.load').fadeOut("slow");
    $('.page_content').fadeIn("slow");
});

function validate(){
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
                url: "verify-email",
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
                url: "project/categs",
                type:'post',
                data: {
                    categs : cate,
                },
                success: function(result){
                    let data = JSON.parse(result);
                    const categories = data.response;
                    // formatting projects from categories picked
                    let header =
                    jQuery.map(categories, (element, keys) => {
                        var elementArray = Object.values(element);
                        return `<div class = "Category_header">
                                    <h3>${keys}</h3>
                                        <hr class = "create">
                                            <div class = "content">` +
                                        elementArray.map(i => {
                                            return `
                                                <span class = "list_category">${i['title']}<input type="checkbox" name="Followed[]" class="form-check-input btn_follow" value = ${i['id']}></span>
                                            `
                                            })
                                        + `
                                            </div>
                                </div>`
                      })
                    // inserting to html
                    document.querySelector('#Category_content').innerHTML = header;
                    $('#SignUpModal3').modal('hide');
                    $('#SignUpModal4').modal('show');
                }
            });
        }
    }

};

function GoogleForm(){
    var form = $("#GoogleForm");
    form.validate({
        rules: {
            'GCategs[]': {
                required: true,
                minlength: 3,
            },
            'GFollowed[]': {
                required: true,
                minlength: 3,
            },
        },
        messages: {
            'GCategs[]': {
                required: "You must check at least 3 categories",
                minlength: "Check at least {0} categories"
            },
            'GFollowed[]': {
                required: "You must follow at least 3 projects",
                minlength: "Check at least {0} projects"
            },
        }
    });

    if (form.valid() === true){
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
                    const categories = data.response;
                    // formatting projects from categories picked
                    console.log('categories :', categories)
                    let Gheader =
                    jQuery.map(categories, (element, keys) => {
                        var elementArray = Object.values(element);
                        return `<div class = "Category_header">
                                    <h3>${keys}</h3>
                                        <hr class = "create">
                                            <div class = "content">` +
                                        elementArray.map(i => {
                                            return `
                                                <span class = "list_category">${i['title']}<input type="checkbox" name="GFollowed[]" class="form-check-input btn_follow" value = ${i['id']}></span>
                                            `
                                            })
                                        + `
                                            </div>
                                </div>`
                      })
                      console.log('Gheader :', Gheader)
                    // inserting to html
                    document.querySelector('#GCategory_content').innerHTML = Gheader;
                    $('#SignUpModal5').modal('hide');
                    $('#SignUpModal6').modal('show');
                }
            });
        }
    }
};

jQuery(document.body).on('click', '.btn_follow', function(e){
    var btnClass = $(e.target).parent();
    if (btnClass.hasClass('followed')){
        btnClass.removeClass('followed')
    }else{
        btnClass.addClass('followed')
    }
  });

function activateToast(){
    var c = $(this).data('id');
    var insert
    console.log(c)
    if (c == 'logO' || c == 'logI'){
        var mode = $(this).data('mode');
        console.log(mode)
        $('.toast-container').addClass('position-fixed bottom-0 end-0')
        $('.toast-header').addClass('bg-danger text-white')
        if (!mode && c == 'logI'){
            insert = `Verify your email in your profile settings.`
            $(this).removeAttr('href')
        }else{
            insert = `Register or Log In first`
        }
    }
    into.innerHTML = insert


    $('.DevToast').toast('show');
}

function showRegister(){
    $('#LoginModal').modal('hide');
    $('#SignUpModal').modal('show');
}


function showLogin(){
    $('#LoginModal').modal('show');
    $('#SignUpModal').modal('hide');
}

$('#LoginSubmit').on("click", function(){
    var email = document.getElementById("InputEmail").value;
    var pass = document.getElementById("InputPassword").value;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "verify-log",
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
            else
                document.getElementById("LogInForm").submit();
        }

    });
});

function loadBtn (e) {
    var btn = $(e.target).attr('data-btn');

    google.accounts.id.renderButton(
        document.getElementById(btn),
        { theme: "outline", size: "large", text: "continue_with"}  // customization attributes
    );
}

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

function DetValid(e){
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
}


$('#LoginModal').on('show.bs.modal',  loadBtn);
$('#SignUpModal').on('show.bs.modal',  loadBtn);
// Normal Auth
$('.next').click(validate);
$("#submit").on("click",validate);
// Google Auth
$('.Gnext').click(GoogleForm);
$("#Gsubmit").on("click",GoogleForm);
$("#modeToast").on("click", activateToast);
$("#modeToast2").on("click", activateToast);
$("#modeToast3").on("click", activateToast);
$("#modeToast4").on("click", activateToast);
$("#register").on("click", showRegister);
$("#login").on("click", showLogin);
$('.tab_next').on('click', DetValid);


