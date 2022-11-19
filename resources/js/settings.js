const into = document.querySelector('.toast-body')
// Send code in email
$('#generateCode').on('click', function () {
    if(document.getElementById("verifyCode"))
        document.getElementById("verifyCode").disabled = false;

    disableResend();
    timer(60);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "send-email",
        type:'post',
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

// Verify the input code for email verification
$('#verifyCode').on('click', function () {
    var code = document.getElementById("inputCode").value;
    $.ajax({
        url: "verify",
        type:'post',
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
    var activeToast = localStorage.getItem('activeToast');
    if(activeTab){
        $('#'+ activeTab).tab('show');
        // Remove so it only happen once
        localStorage.removeItem("activeTab");
    }
    if(activeToast){
        $('.toast-container').addClass('position-fixed bottom-0 end-0')
        $('.toast-header').addClass('bg-success text-white')
        var insert = `Changes saved`
        into.innerHTML = insert      
        $('#'+ activeToast).toast('show');
        // Remove so it only happen once
        localStorage.removeItem("activeToast");
    }
});


$("#confirmPass").on("keyup", function(){
    var form = $("#changePass");

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
        document.getElementById("submitChanges").disabled = false;
    }

}); 

$("#submitChanges").on("click", function(){
    
    var code = document.getElementById("code").value;
    $.ajax({
        url: "verify",
        type:'post',
        data: {
            code : code,
        },
        success: function(result){
            let data = JSON.parse(result);

            if(data.response == "success") {
                document.getElementById("changePass").submit();
            } 
            else {
                document.getElementById('errorMsg').innerHTML = 'Incorrect verification code'; 
            }
        }
 
    });


});

// Edit modal body 
$(".editInfo").click(function(e){
    var info = $(e.target).attr('data-params');
    console.log(e)
    if (info == 'name'){
        document.getElementById('editInfo').innerHTML = `
            <div class="mb-3">
                <label for="inputLname" class="form-label">Last Name</label>
                <input type="text" name = "inputLname" class="form-control border-info" id="inputLname" value="${$(e.target).attr('data-lname')}" required/>
            </div> 
            <div class="mb-3">
                <label for="inputFname" class="form-label">First Name</label>
                <input type="text" name = "inputFname" class="form-control" id="inputFname" value="${$(e.target).attr('data-fname')}" required/>
            </div>
            <div class="mb-3">
                <label for="inputMname" class="form-label">Middle Name</label>
                <input type="text" name="inputMname" class="form-control" id="inputMname" value="${$(e.target).attr('data-mname')}"/>
            </div>`
            document.getElementById("editForm").action = "change-name"; 
    }
    else{
        document.getElementById('editInfo').innerHTML = `
            <div class="mb-3" id="editInfo">
                <label for="InputAdress" class="form-label">Address</label>
                <textarea type="textarea" name = "inputAddress" class="form-control border-info" id="inputAddress" required>${$(e.target).attr('data-address')}</textarea>
            </div> `
        document.getElementById("editForm").action = "change-address"; 
    }
});

// Send code to user's email
$("#sendCode").click(function (e){
    document.getElementById('verify').disabled = false;
 
    e.target.innerHTML = 'Sent';
    e.target.disabled = true

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "send-email",
        type:'post',
    });
});


$("#verifyModal").on("show.bs.modal", function(){
    document.getElementById("sendCode").disabled = false
    document.getElementById("sendCode").innerHTML = `Send code <i class="fa-solid fa-paper-plane"></i>`
    document.getElementById("verify").disabled = true
});

// Verify code for change email
$("#verify").click(function(e){
    var code = document.getElementById("inputCode2").value
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "verify",
        type:'post',
        data: {
          code : code,
        },
        success: function(result){
            let data = JSON.parse(result);
            
            if(data.response == "success") {
                $('#verifyModal').modal('hide');
                document.getElementById('editInfo').innerHTML = `
                    <div class="mb-3" id="editInfo">
                        <label for="InputEmail" class="form-label">New Email address</label>
                        <input type="email" name = "inputEmail" class="form-control border-info" id="inputEmail" aria-describedby="emailHelp" required/>
                    </div>`;
                document.getElementById("editForm").action = "change-email"; 
                $('#editModal').modal('show'); 
            } 
            else {
                document.getElementById('showError').innerHTML='Incorrect verification code';
            }
        }
    });
});



// Verify if password is correct then submit the form
$("#saveChanges").click(function(){
    var form = $("#editForm");
    var pass = document.getElementById("checkPassword").value
    
    if(form.valid() === true){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "check-pass",
            type:'post',
            data: {
              pass : pass,
            },
            success: function(result){
                let data = JSON.parse(result);
                
                if(data.response == "success") {
                    localStorage.setItem('activeToast', 'DevToast');    
                    document.getElementById("editForm").submit();   
                } 
                else {
                    document.getElementById('errorPassword').innerHTML='Incorrect password';
                }
            }
        });
    }
});

