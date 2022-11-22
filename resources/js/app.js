import './bootstrap';

import '../sass/app.scss';

const into = document.querySelector('.toast-body')

function validate(){
    var form = $("#myForm");
    form.validate({
        rules: {
            'Categs[]': { 
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
            
        }
    }

};

function activateToast(){
    var c = $(this).data('id');
    var insert
    if (c == 'logO' || c == 'logI'){
        var mode = $(this).data('mode');
        $('.toast-container').addClass('position-fixed bottom-0 end-0')
        $('.toast-header').addClass('bg-danger text-white')
        if (!mode && c == 'logI'){
            insert = `Verify your email in your profile settings.`
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
    console.log($curr)
    if(target == '#nav-basic')
        $('.progress-bar').css('width', '25%')
    if(target == '#nav-reward')
        $('.progress-bar').css('width', '50%')
    if(target == '#nav-story')
        $('.progress-bar').css('width', '75%')
    if(target == '#nav-payment')
        $('.progress-bar').css('width', '100%')
});

$('#LoginModal').on('show.bs.modal',  loadBtn);
$('#SignUpModal').on('show.bs.modal',  loadBtn);
$('.next').click(validate);
$("#submit").on("click",validate);
$("#modeToast").on("click", activateToast);
$("#register").on("click", showRegister);
$("#login").on("click", showLogin);

