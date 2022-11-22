@extends('layouts.CreateProj')

@section('content')
<x-styles.defnav/>

<div class="project_body d-flex justify-content-center">
    <div class="col rounded shadow p-4">
        <h1 class = "d-flex justify-content-center">Create Project Form</h1>
        <div class="row d-flex justify-content-center align-content-center col">
            <nav>
                <div class="nav nav-tabs prog_tabs justify-content-center" id="nav-create" role="tablist">
                    <div class="arrow d-flex align-items-center d-block d-sm-none fs-2"></a><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="nav-link active" id="nav-basic-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-basic" aria-selected="true">
                        <i class="fa-solid fa-file-lines"></i>
                        <h5 class="d-none d-sm-block">Basic</h5>
                    </a>
                    <div class="arrow d-flex align-items-center fs-2"></a><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="nav-link" id="nav-reward-tab" data-bs-toggle="tab" data-bs-target="#nav-reward" type="button" role="tab" aria-controls="nav-reward" aria-selected="false">
                        <i class="fa-solid fa-gift"></i>
                        <h5 class="d-none d-sm-block">Reward</h5> 
                    </a>
                    <div class="w-100 d-block d-sm-none"></div>
                    <div class="arrow d-flex align-items-center fs-2"></a><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="nav-link" id="nav-story-tab" data-bs-toggle="tab" data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story" aria-selected="false">
                        <i class="fa-solid fa-swatchbook"></i>
                        <h5 class="d-none d-sm-block">Story</h5>
                    </a>
                    <div class="arrow d-flex align-items-center fs-2"></a><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="nav-link" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-payment" aria-selected="false">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <h5 class="d-none d-sm-block">Payment</h5>
                    </a>
                </div>
            </nav>
        <div class="row create_prog d-flex justify-content-center mb-5">
            <div class="progress col-sm-10 col-xl-8 p-0">
                <div class="progress-bar bg-success" role="progressbar" aria-label="Success example" style="width: 25%" aria-valuenow="25%" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <hr class="create">

        <form method="post" action="{{ route('project.save') }}" accept-charset="UTF-8" enctype='multipart/form-data'>
        @csrf
            <div class="tab-content container" id="nav-createContent">
                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab" tabindex="0">
                    <x-create.projdet/>            
                </div>
                <div class="tab-pane fade" id="nav-reward" role="tabpanel" aria-labelledby="nav-reward-tab" tabindex="0">
                    <x-create.projreward/> 
                </div>
                <div class="tab-pane fade" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab" tabindex="0">
                    Test
                </div>
                <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
                    <div class="row mt-3 mb-5 text-center">
                        <h1>Payment Process</h1>
                        <p class = "fs-5">Verify who will be collecting money and receiving it if this project meets its funding target. 
                            Make sure the information you give is accurate. It cannot be changed once it has been submitted.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-5 p-3 my-auto">
                            <h3>
                                Contact Email
                            </h3>
                            <section class="mt-4 fs-6">
                                Verify the email address we should use to communicate with each other regarding this project.
                                <br>
                                If the wrong email is displayed, make the necessary changes on your <a href = {{'settings'}}> account</a>.
                            </section>
                        </div>
                        <div class="col-7 px-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingTitle" name = "ProjTitle" placeholder="Title Here..." required>
                                <label for="floatingTitle">Project Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Short project description..." name = "ProjDesc" id="floatingDesc" style="height: 150px" required></textarea>
                                <label for="floatingDesc">Project Description</label>
                            </div>
                        </div>
                    </div>
                    <hr class = "create">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection