import './bootstrap';

import '../sass/app.scss';

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


$('.next').click(validate);
$("#submit").on("click",validate);
$("#modeToast").on("click", activateToast);
$("#register").on("click", showRegister);
$("#login").on("click", showLogin);

