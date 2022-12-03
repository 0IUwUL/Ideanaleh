<!-- Initialize google button -->
<div id="g_id_onload"
  data-client_id="858839383289-5m5kp74ondfn61no39porlmjfqdbg0lf.apps.googleusercontent.com"
  data-login_uri="{{route('google.login-user')}}"
  data-_token="{{csrf_token()}}" 
  data-method="post" 
  data-auto_prompt="false">
</div>

<!-- Login -->
<div class="modal p-0" id="LoginModal" data-btn="loginModalGSI"tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content border-info">
    <div class="modal-header bg-info text-white">
      <h1 class="modal-title fs-3" id="LoginModalLabel">Login</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-4">
    <form method="post" action="{{ route('login-user') }}" accept-charset="UTF-8" id = "LogInForm">
      @csrf
          <div class="mb-3">
              <label for="InputEmail" class="form-label">Email address</label>
              <input type="email" name = "LoginEmail" class="form-control border-info" id="InputEmail" aria-describedby="emailHelp" required/>
              <span class = "error" id = "err_mail"></span>
          </div>
          <div class="mb-3">
              <label for="InputPassword" class="form-label">Password</label>
              <input type="password" name = "LoginPassword" class="form-control border-info" id="InputPassword" required/>
              <span class = "error" id = "err_pass"></span>
            </div>
          <div class="mb-3">
              <a role = "button" class ="link-primary" id = "register"> Not registered yet? Signup</a>
          </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" id="LoginSubmit" class="btn btn-primary">Login</button>

      <!-- Google button-->
      <div id="loginModalGSI"></div> 
    </div>
    </form>
  </div>
</div>
</div>

<!-- SignUp -->
<form method="post" action="{{route('register-user')}}" accept-charset="UTF-8" id="myForm">
@csrf           
              
<div class="modal fade p-0" id="SignUpModal" data-btn="signupModalGSI" aria-hidden="true" aria-labelledby="SignUpModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="SignUpModalToggleLabel">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body p-4">
          <div class="d-flex justify-content-center display-6 text-dark">
                    Profile Information
          </div>
              
            <div class="mt-3">
            
                    <div class="mb-3">
                      <label for="InputLName" class="form-label">Last Name</label>
                      <label class="text-danger ms-1">*</label>
                      <input type="text" name = "Lname" class="form-control border-info" id="Lname" required/>
                    </div>
                    <div class="mb-3">
                      <label for="InputFName" class="form-label">First Name</label>
                      <label class="text-danger ms-1">*</label>
                      <input type="text" name = "Fname" class="form-control border-info" id="FName" required/>
                    </div>
                    <div class="mb-3">
                        <label for="InputMName" class="form-label">Middle Name</label>
                        <input type="text" name = "Mname" class="form-control border-info" id="MName"/>
                    </div>
                    <div class="mb-3">
                      <label for="InputAddress" class="form-label">Complete Address</label>
                      <label class="text-danger ms-1">*</label>
                      <textarea name = "address" class="form-control border-info" id="Address" required></textarea>
                    </div>
            </div>
            <div class="mb-3">
              <a role = "button" class ="link-primary" id = "login"> Already a user? Login</a>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success next" >Next</button>
        
        <!-- Google button-->
        <div id="signupModalGSI"></div> 
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SignUpModal2" aria-hidden="true" aria-labelledby="SignUpModalToggle2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="SignUpModalToggle2">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
        <div class="d-flex justify-content-center display-6 text-dark">
              Email Authentication
        </div>
            <div class="mt-3">
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Email</label>
                    <label class="text-danger me-1">*</label>
                    <input type="email" name = "email" class="form-control border-info" id="email" required/>
                    <span class = "error" id = "dupli"></span>
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Input Password</label>
                    <label class="text-danger me-1">*</label>
                    <input type="password" name = "password" class="form-control border-info" id="password" minlength="8" required/>
                </div>
                <div class="mb-3">
                    <label for="InputRePassword" class="form-label">Re-Enter Password</label>
                    <label class="text-danger me-1">*</label>
                    <input type="password" name = "rePassword" class="form-control border-info" id="rePassword" required data-rule-equalTo = '#password'/>
                </div>
                <div class="mb-3">
                    <label for="InputIMG" class="form-label">Upload image as an icon:</label>
                    <input type="file" name = "image" class="form-control border-info"  accept=".jpeg,.jpg,.png" id="InputIMG"/>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-target="#SignUpModal" data-bs-toggle="modal">Back</button>
        <button type="button" class="btn btn-success next" id="next">Next</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SignUpModal3" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="SignUpModalToggle3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="SignUpModalToggle3">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
          <div class="d-flex justify-content-center display-6 text-dark">
                Category Selection
          </div>  
            <div class="mt-3">
                <label class="form-label">Choose preffered categories (3 at least): </label>
                <label class="text-danger me-1">*</label>
                <div class="input-group mb-3 d-flex justify-content-evenly">
                    <div class="input-group-text categs">
                        <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value = 'Games' aria-label="Checkbox for Games"> Games
                    </div>
                    <div class="input-group-text categs">
                        <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Business" aria-label="Checkbox for Business"> Business
                    </div>
                    <div class="input-group-text categs">
                        <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="AI" aria-label="Checkbox for AI"> AI
                    </div>
                    <div class="input-group-text categs">
                        <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Agriculture" aria-label="Checkbox for Agriculture"> Agriculture
                    </div>
                    <div class="input-group-text categs">
                        <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Music" aria-label="Checkbox for Music"> Music
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="IOT" aria-label="Checkbox for IOT"> IOT
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Communication" aria-label="Checkbox for Communication"> Communication
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Medical" aria-label="Checkbox for Medical"> Medical
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Transportation" aria-label="Checkbox for Transportation"> Transportation
                    </div> 
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Education" aria-label="Checkbox for Education"> Education
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Security" aria-label="Checkbox for Security"> Security
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="VR/AR" aria-label="Checkbox for VR/AR"> VR/AR
                    </div>
                    <div class="input-group-text categs">
                      <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Others" aria-label="Checkbox for Others"> Others
                    </div>
                </div>
                <label for="Categs[]" class="error">Your error message will be display here.</label>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-target="#SignUpModal2" data-bs-toggle="modal">Back</button>
        <button type="button" class="btn btn-success next" id="button">Next</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="SignUpModal4" aria-hidden="true" data-bs-backdrop="static" aria-labelledby="SignUpModalToggle4" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="SignUpModalToggle4">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
          <div class="d-flex justify-content-center display-5 text-dark">
            Follow Projects under your preferences
          </div>  
          <div class="warn d-flex justify-content-center display-6 text-info">
            Please select at least 3 projects to follow
          </div>
          <div class="mt-5" id = "Category_content">
          </div>
          <label for="Followed[]" class="error">Your error message will be display here.</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-target="#SignUpModal3" data-bs-toggle="modal">Back</button>
        <button type="submit" class="btn btn-success" id="submit">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>