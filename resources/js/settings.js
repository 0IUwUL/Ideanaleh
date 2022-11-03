// Send code in email
$('#generateCode').on('click', function () {
    document.getElementById("verifyCode").disabled = false;
    disableResend();
    timer(60);
        $.ajax({
            url: "send-email",
            type:'get',
        });

    });

function disableResend()
{
    $("#regenerateOTP").attr("disabled", true);
    timer(60);
    setTimeout(function() {
    // enable click after 1 second
    $('#regenerateOTP').removeAttr("disabled");
    }, 60000); // 1 second delay
}


function timer(remaining) {
    var m = Math.floor(remaining / 60);
    var s = remaining % 60;
    
    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;
    let resend = "Resend";
    document.getElementById('timer').textContent = m + ':' + s;
    remaining -= 1;
    
    if(remaining >= 0) {
        setTimeout(function() {
            timer(remaining);
        }, 1000);
        return;
    }
    
    document.getElementById('timer').textContent = resend;
    
}

// Verify the input code
$('#verifyCode').on('click', function () {
    var code = document.getElementById("inputCode").value;
    console.log(code);
    $.ajax({
        url: "verify",
        type:'get',
        data: {
          code : code,
        },
        success: function(result){
            let data = JSON.parse(result);
            
            if(data.response == "success") {
                // Store the id of account tab
                localStorage.setItem('activeTab', 'v-pills-account-tab');
                
                // Reload to change the content to change pass
                location.reload();
                } 
            else {
                document.getElementById('error').innerHTML='Incorrect verification code';
            }
        }
    });

});

// Show the same tab after verifying
$(document).ready(function(){
    var activeTab = localStorage.getItem('activeTab');
    
    if(activeTab){
        $('#'+ activeTab).tab('show');
        // Remove so it only happen once
        localStorage.removeItem("activeTab");
    }
});

function validate(){
    var form = $("#changePass");

    form.validate({
        messages: {
            confirmPass: {
                equalTo: "Doesn't match with new password",
            },
        }
    });
}

$("#submitChanges").on("keyup", validate);