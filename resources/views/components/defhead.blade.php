<div>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid d-flex justify-content-evenly">
            <div class = "d-flex align-items-center">
                <a class="navbar-brand" href="#">
                    <div class = "display-6">
                        Ideanaleh
                    </div>
                </a>
            </div>

            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> -->
            
            <div class="col-7">
                <form class="container-fluid">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon1">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                    </div>
                </form>
            </div>
            @if(!session()->has('loginId'))
            <div class="col-2 d-flex justify-content-end">
                    <button type="button" class="btn btn-light btn-outline-dark mx-3" data-bs-toggle="modal" data-bs-target="#SignUpModal">
                        Sign Up
                    </button>
                    <button type="button" class="btn btn-primary btn-outline-light text- white mx-3" data-bs-toggle="modal" data-bs-target="#LoginModal">
                        Login
                    </button>
            </div>
            @else
            <div class="col-2 d-flex justify-content-end">
                <form method="get" action="{{ route('logout') }}">
                  <button type="submit" class="btn btn-primary btn-outline-light text- white mx-3">
                      Logout
                  </button>
                </form>
            </div>
            @endif

        </div>
    </nav>
</div>

<!-- Login -->
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-info">
      <div class="modal-header bg-info text-white">
        <h1 class="modal-title fs-3" id="LoginModalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-4">
      <form method="post" action="{{ route('login-user') }}" accept-charset="UTF-8")>
        @csrf
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email address</label>
                <input type="email" name = "LoginEmail" class="form-control border-info" id="InputEmail" aria-describedby="emailHelp" required/>
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" name = "LoginPassword" class="form-control border-info" id="InputPassword" required/>
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div> -->
            <div class="d-grid">
                <button class="btn btn-primary" type="button">Login in with Google</button>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- SignUp -->
<form method="post" action="{{route('register')}}" accept-charset="UTF-8" id="myForm">
  @csrf           
                
  <div class="modal" id="SignUpModal" aria-hidden="true" aria-labelledby="SignUpModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="SignUpModalToggleLabel">Sign Up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body p-4">
            <div class="d-flex justify-content-center fw-semibold text-danger">
                  Step 1 of 3
            </div>
            <div class="d-flex justify-content-center display-6 text-dark">
                      Profile Information
            </div>
                
              <div class="mt-3">
              
                      <div class="mb-3">
                          <label for="InputLName" class="form-label">Last Name</label>
                          <input type="text" name = "Lname" class="form-control border-info" id="Lname" required/>
                      </div>
                      <div class="mb-3">
                          <label for="InputFName" class="form-label">First Name</label>
                          <input type="text" name = "Fname" class="form-control border-info" id="FName" required/>
                      </div>
                      <div class="mb-3">
                          <label for="InputMName" class="form-label">Middle Name</label>
                          <input type="text" name = "Mname" class="form-control border-info" id="MName" required/>
                      </div>
                      <div class="mb-3">
                          <label for="InputAddress" class="form-label">Complete Address</label>
                          <textarea name = "address" class="form-control border-info" id="Address" required></textarea>
                      </div>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success next" >Next</button>
          
          <!-- Google button-->
          <div id="g_id_onload"
            data-client_id="858839383289-5m5kp74ondfn61no39porlmjfqdbg0lf.apps.googleusercontent.com"
            data-login_uri="{{route('google.callback')}}"
            data-_token="{{csrf_token()}}" 
            data-method="post" 
            data-auto_prompt="false">
          </div>
          <div class="g_id_signin"
            data-type="standard"
            data-size="large"
            data-theme="outline"
            data-text="sign_in_with"
            data-shape="rectangular"
            data-logo_alignment="left">
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="SignUpModal2" aria-hidden="true" aria-labelledby="SignUpModalToggle2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="SignUpModalToggle2">Sign Up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
          <div class="d-flex justify-content-center fw-semibold text-danger">
            Step 2 of 3
          </div>  
          <div class="d-flex justify-content-center display-6 text-dark">
                Email Authentication
          </div>
              <div class="mt-3">
                  <div class="mb-3">
                      <label for="InputEmail" class="form-label">Email</label>
                      <input type="email" name = "email" class="form-control border-info" id="email" required/>
                  </div>
                  <div class="mb-3">
                      <label for="InputPassword" class="form-label">Input Password</label>
                      <input type="password" name = "password" class="form-control border-info" id="password" minlength="8" required/>
                  </div>
                  <div class="mb-3">
                      <label for="InputRePassword" class="form-label">Re-Enter Password</label>
                      <input type="password" name = "rePassword" class="form-control border-info" id="rePassword" required data-rule-equalTo = '#password'/>
                  </div>
                  <div class="mb-3">
                      <label for="InputIMG" class="form-label">Upload image as an icon (optional):</label>
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

  <div class="modal" id="SignUpModal3" aria-hidden="true" aria-labelledby="SignUpModalToggle3" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="SignUpModalToggle3">Sign Up</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <div class="d-flex justify-content-center fw-semibold text-danger">
              Step 3 of 3
            </div>  
            <div class="d-flex justify-content-center display-6 text-dark">
                  Category Selection
            </div>  
              <div class="mt-3">
                  <label class="form-label">Choose preffered categories (3 at least): </label>
                  <div class="input-group mb-3 d-flex justify-content-evenly">
                      <div class="input-group-text">
                          <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value = 'Games' aria-label="Checkbox for Games"> Games
                      </div>
                      <div class="input-group-text">
                          <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Business" aria-label="Checkbox for Business"> Business
                      </div>
                      <div class="input-group-text">
                          <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="AI" aria-label="Checkbox for AI"> AI
                      </div>
                      <div class="input-group-text">
                          <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Agriculture" aria-label="Checkbox for Agriculture"> Agriculture
                      </div>
                      <div class="input-group-text">
                          <input class="form-check-input mt-0" type="checkbox" name="Categs[]" value="Music" aria-label="Checkbox for Music"> Music
                      </div>
                  </div>
                  <label for="Categs[]" class="error">Your error message will be display here.</label>
              </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-bs-target="#SignUpModal2" data-bs-toggle="modal">Back</button>
          <button type="submit" class="btn btn-success" id="submit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
