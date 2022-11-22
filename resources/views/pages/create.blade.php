@extends('layouts.CreateProj')

@section('content')
<x-styles.defnav/>

<div class="project_body d-flex justify-content-center">
    <div class="col rounded shadow p-4">
        <h1 class = "d-flex justify-content-center">Create Project Form</h1>
        <div class="row d-flex justify-content-center align-content-center col">
            <nav>
                <div class="nav nav-tabs prog_tabs justify-content-center" id="nav-create" role="tablist">
                    <a class="nav-link active" id="nav-basic-tab" data-bs-toggle="tab" data-bs-target="#nav-basic" type="button" role="tab" aria-controls="nav-basic" aria-selected="true">
                        <i class="fa-solid fa-file-lines"></i>
                        <h5>Basic</h5>
                    </a>
                    <a class="nav-link" id="nav-reward-tab" data-bs-toggle="tab" data-bs-target="#nav-reward" type="button" role="tab" aria-controls="nav-reward" aria-selected="false">
                        <i class="fa-solid fa-gift"></i>
                        <h5>Reward</h5> 
                    </a>
                    <a class="nav-link" id="nav-story-tab" data-bs-toggle="tab" data-bs-target="#nav-story" type="button" role="tab" aria-controls="nav-story" aria-selected="false">
                        <i class="fa-solid fa-swatchbook"></i>
                        <h5>Story</h5>
                    </a>
                    <a class="nav-link" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target="#nav-payment" type="button" role="tab" aria-controls="nav-payment" aria-selected="false">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <h5>Payment</h5>
                    </a>
                </div>
            </nav>
        <div class="row create_prog d-flex justify-content-center mb-5">
            <div class="progress col-8 p-0">
                <div class="progress-bar bg-success" role="progressbar" aria-label="Success example" style="width: 25%" aria-valuenow="25%" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <hr class="create">
        <div class="tab-content" id="nav-createContent">
            <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab" tabindex="0">
                hi
            </div>
            <div class="tab-pane fade" id="nav-reward" role="tabpanel" aria-labelledby="nav-reward-tab" tabindex="0">
                hello
            </div>
            <div class="tab-pane fade" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab" tabindex="0">
                shish
            </div>
            <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
                rawr
            </div>
        </div>
    </div>
</div>
@endsection