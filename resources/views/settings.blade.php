<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Ideanaleh</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body>
    <x-defhead/>
    <div class="settings">
        <div class="set-header">
            <div class="row text-dark d-flex justify-content-center">
                <div class="col_set col-2 bg-light rounded shadow">
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
                <div class="col-7 bg-light rounded set_content shadow tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="p-5">
                            wow
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab" tabindex="0">
                        rawr
                    </div>
                    <!-- <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab" tabindex="0">yie</div> -->
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>