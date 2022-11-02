// Send code in email
$('#generateCode').on('click', function () {
    document.getElementById("verifyCode").disabled = false;
    disableResend();
    timer(60);
        $.ajax({
            url: "{{route('send-email')}}",
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

let timerOn = true;

function timer(remaining) {
    var m = Math.floor(remaining / 60);
    var s = remaining % 60;
    
    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;
    resend = "Resend";
    document.getElementById('timer').textContent = m + ':' + s;
    remaining -= 1;
    
    if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
    }

    if(!timerOn) {
    return;
    }
    document.getElementById('timer').textContent = resend;
    return;
}

// Verify the input code
$('#verifyCode').on('click', function () {
    var code = document.getElementById("inputCode").value;
    console.log(code);
    $.ajax({
        url: "{{route('verify')}}",
        type:'get',
        data: {
          code : code,
        },
        success: function(result){
            data = JSON.parse(result);
            console.log(data);
            if(data.response == "success") {
                document.getElementById('error').innerHTML='Verified Account';
                // Can also refresh the page and load the change pass view
            } 
            else {
                document.getElementById('error').innerHTML='Incorrect verification code';
            }
        }
    });

    });
