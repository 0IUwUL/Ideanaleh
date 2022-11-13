@extends('layouts.default')

<x-styles.settingsnav/>

@section('content')

    <div class="settings">
        <div class="set-header">
            <div class="row text-dark d-flex justify-content-center">
                <div class="col-2 bg-light rounded shadow">
                    <div class="nav flex-column set_tabs mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">
                            <i class="fa-solid fa-user icon_settings me-2"></i> Profile
                        </button>
                        <button class="nav-link" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="false">
                            <i class="fa-solid fa-at icon_settings me-2"></i> Account
                        </button>
                        <!-- <button class="nav-link" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment" aria-selected="false">
                        <i class="fa-solid fa-gear icon_settings me-2"></i> Projects
                        </button> -->
                    </div>
                </div>
                <div class="col-8 bg-light rounded set_content shadow tab-content" data-bs-spy="scroll" id="v-pills-tabContent">
                    <!-- Personal information -->
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="p-4">
                            <div class="row">
                                <div class="col">
                                    <div class="col">
                                        Avatar in use:
                                    </div>
                                    <div class="col">
                                        @if ($user->icon)
                                            <img src="{{asset('storage/'.$user->icon);}} " width="100" height="100" >
                                        @else
                                            <i class="fa-solid fa-images display-2"></i>
                                        @endif
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn" type="button"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#uploadModal" >
                                        <i class="fa-solid fa-user-pen settings_edit_icon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Image Upload Modal -->
                            <div class="modal fade" id="uploadModal"  tabindex="-1" aria-labelledby="uploadModal" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <form action ="{{route('upload-img')}}" method="post" enctype='multipart/form-data' >
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h4 class="modal-title" id="InputModalTitleLabel">Upload Photo</h4>
                                            </div> 

                                            <div class="modal-body text-color">
                                                <input name="avatar" id = 'avatar' type="file" accept="image/*" required/>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-custom cancel" data-bs-dismiss="modal" >Close</button>
                                                <button type="submit" class="btn btn-custom" >Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <hr>

                            <div class="col">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <div>Name :</div>
                                        <div id="inputName"> {{$user->Lname}}, {{$user->Fname}} {{$user->Mname}} </div>
                                    </div>
                                    <a type="button" class="text-primary editInfo"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal" 
                                        data-params="name"
                                        data-lname={{$user->Lname}}
                                        data-fname={{$user->Fname}}
                                        data-mname={{$user->Mname}}>
                                        Edit</a>
                                </div>
                                <hr class="solid">

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <div>Email :</div>
                                        <div id="inputame"> {{$user->email}} </div>
                                    </div>
                                    <a type="button" class="text-primary"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#verifyModal" 
                                        data-params="email"
                                        name="editInfo">
                                        Edit</a>
                                </div>

                                <hr class="solid">

                               <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-column">
                                        <div>Address :</div>
                                        <div id="inputLname"> {{$user->address}} </div>
                                    </div>
                                    <a type="button" class="text-primary editInfo"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal" 
                                        data-params="address"
                                        data-address={{$user->address}}>
                                        Edit</a>
                                </div>
                                    
                                    
                            </div>

                            <!-- Edit Info Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-info">
                                        <form method="post" action="" accept-charset="UTF-8"id="editForm">
                                            @csrf
                                            <div class="modal-header bg-info text-white">
                                                <h1 class="modal-title fs-3" id="LoginModalLabel">Edit</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                       
                                            <div class="modal-body p-4">
                                                <div class="mb-3" id="editInfo">
                                                   {{-- Adjust modal info --}}
                                                </div>
                                                <div class="mb-3">
                                                    <label for="InputPassword" class="form-label">Current Password</label>
                                                    <input type="password" name = "password" class="form-control border-info" id="checkPassword" required/>
                                                    <div id="errorPassword" class="error"></div>
                                                </div> 
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" id="saveChanges" class="btn btn-primary " >Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Verify Email Modal -->
                            <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form>
                                            @csrf
                                            <div class="modal-header bg-danger text-white ">
                                                <h1 class="modal-title fs-3" id="LoginModalLabel">Verify Your Email</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                       
                                            <div class="modal-body p-4">
                                                <div class="mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <label id="oldtEmail">Email</label>
                                                            <div> {{$user->email}}</div>
                                                        </div>
                                                        <button type="button" id="sendCode" class = "btn btn-primary">Send code <i class="fa-solid fa-paper-plane"></i></button>
                                                    </div> 
                                                </div>
                                                <div class="mb-3">
                                                    <label for="VerifyCode" class="form-label">Verification Code</label>
                                                    <input name = "inputCode" class="form-control border-info" id="inputCode2" required/>
                                                    <div id="showError" class="error"></div>
                                                </div> 
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" id="verify" class="btn btn-primary ">Verify</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab" tabindex="0">
                        <div class="p-4">
                            <div class="h1">Manage your account</div>
                            
                                <div class="row mb-3">
                                    @if ($user->dev_mode == '0')
                                    <!-- Unverified email -->
                                    <span id="error" class = "text-danger mb-3">*Please verify your account</span>
                                    <label for="inputEmail" class="col-sm-2 col-form-label"><h3>Email</h3></label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label id="inputEmail">{{$user->email}}</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <button id="generateCode" class = "btn btn-primary"><span id="timer">Send code <i class="fa-solid fa-paper-plane"></i></span></button>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCode" class="col-sm-4 col-form-label">Input verification code</label>
                                    <div class="col-sm-4">
                                    <input type="text" name = "code" class="form-control" id="inputCode" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button id="verifyCode" type="submit" class="btn btn-primary" disabled>Verify</button>
                                </div>
                                
                                @else
                                <!-- Verified Email -->
                                <span id="error" class = "text-success mb-3">Verified Account</span>
                                <label for="inputChangePass" class="col-sm-4 col-form-label" id = "title"><h3>Change Password</h3></label>
                                <form method="post"  action="{{ route('change-pass') }}" accept-charset="UTF-8" id="changePass">
                                    @csrf
                                    <div class="row mt-3">
                                       
                                        <div class="mb-3 row">
                                            <div class="col-sm-4">
                                                <label id="inputChangePass">Input New Password</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="newPass" class="form-control" id="newPass" minlength="8" required>
                                            </div> 
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-4">
                                                <label id="inputReChangePass">Re-enter New Password</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="confirmPass" class="form-control" id="confirmPass" required data-rule-equalTo = '#newPass'>
                                            </div> 
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputCode" class="col-sm-4 col-form-label">Input verification code</label>
                                            <div class="col input-group">
                                                <input name="code" id="code" type="text" class="form-control">
                                                <button type="button" id="generateCode" class = "btn btn-primary"><span id="timer">Send code</span></button>
                                            </div>
                                            <div id="errorMsg" class="error"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-end mt-3">
                                        <button id="submitChanges" type="button" class="btn btn-primary" disabled>Submit Changes</button>
                                    </div>
                                </form>
                                @endif
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab" tabindex="0">yie</div> -->
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/settings.js'])
  
@endsection