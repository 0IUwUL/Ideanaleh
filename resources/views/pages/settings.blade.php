@extends('layouts.default')

<x-styles.settingsnav/>


@section('content')
@vite(['resources/js/app.js'])
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
                                        <i class="fa-solid fa-images display-2"></i>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <button class="btn">
                                        <i class="fa-solid fa-user-pen settings_edit_icon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="col">
                                <form class="row g-3">
                                    <div class="col-md-6">
                                        <label for="inputLname" class="form-label">Last Name</label>
                                        <input type="text" name="Lname" class="form-control" id="inputLname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFname" class="form-label">First Name</label>
                                        <input type="text" name = "Fname" class="form-control" id="inputFname">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputMname" class="form-label">Middle Name</label>
                                        <input type="text" name="Mname" class="form-control" id="inputMname">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <textarea name = "address" class="form-control border-info" id="inputAddress"></textarea>
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
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" disabled>Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab" tabindex="0">
                        <div class="p-4">
                            <div class="h1">Manage your account</div>
                            
                                <div class="row mb-3">
                                    <span id="error" class = "text-danger mb-3">*Please verify your account</span>
                                    <label for="inputEmail" class="col-sm-2 col-form-label"><h3>Email</h3></label>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label id="inputEmail">sample@example.com</label>
                                        </div>
                                        <div class="col-sm-6">
                                            <button id="generateCode" class = "btn btn-primary"><span id="timer">Send code <i class="fa-solid fa-paper-plane"></i></span></button>
                                        </div> 
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputCode" class="col-sm-4 col-form-label">Input verification code</label>
                                    <div class="col-sm-4">
                                    <input type="text" name = "code" class="form-control" id="inputCode">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button id="verifyCode" type="submit" class="btn btn-primary" disabled>Verify</button>
                                </div>
                                
                           
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab" tabindex="0">yie</div> -->
                </div>
            </div>
            
        </div>
    </div>
</body>
<script>
    
</script>
@endsection