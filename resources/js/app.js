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
            $('#SignUpModal2').modal('hide');
            $('#SignUpModal3').modal('show');
   
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



$('.next').click(validate);
$("#submit").on("click",validate);
$("#modeToast").on("click", activateToast);
$("#register").on("click", showRegister);
$("#login").on("click", showLogin);

