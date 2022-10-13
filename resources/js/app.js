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
                required: "You must check at least 1 box",
                minlength: "Check atleast {0} boxes"
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
$('.next').click(validate);
$("#submit").on("click",validate);
