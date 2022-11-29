@extends('layouts.CreateProj')

@section('content')
<x-styles.defnav/>

<div class="project_body d-flex justify-content-center">
    <div class="col rounded shadow p-4">
        <h1 class = "d-flex justify-content-center">Create Project Form</h1>
        <div class="row d-flex justify-content-center align-content-center col">
            <nav>
                <div class="nav nav-tabs prog_tabs justify-content-center" id="nav-create" role="tablist">
                    <div class="arrow d-flex align-items-center d-block d-sm-none fs-2"><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="tab_next nav-link active" id="nav-basic-tab" data-bs-toggle="tab" data-bs-target = "#nav-basic" type="button" role="tab" aria-controls="nav-basic" aria-selected="true">
                        <i class="fa-solid fa-file-lines"></i>
                        <h5 class="d-none d-sm-block">Basic</h5>
                    </a>
                    <div class="arrow d-flex align-items-center fs-2"><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="tab_next nav-link disabled" id="nav-reward-tab" data-bs-toggle="tab" data-bs-target = "" type="button" role="tab" aria-controls="nav-reward" aria-selected="false">
                        <i class="fa-solid fa-gift"></i>
                        <h5 class="d-none d-sm-block">Reward</h5> 
                    </a>
                    <div class="w-100 d-block d-sm-none"></div>
                    <div class="arrow d-flex align-items-center fs-2"><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="tab_next nav-link disabled" id="nav-story-tab" data-bs-toggle="tab" data-bs-target = "" type="button" role="tab" aria-controls="nav-story" aria-selected="false">
                        <i class="fa-solid fa-swatchbook"></i>
                        <h5 class="d-none d-sm-block">Story</h5>
                    </a>
                    <div class="arrow d-flex align-items-center fs-2"><i class="fa-solid fa-arrow-right"></i></div>
                    <a class="tab_next nav-link disabled" id="nav-payment-tab" data-bs-toggle="tab" data-bs-target = "" type="button" role="tab" aria-controls="nav-payment" aria-selected="false">
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

        <form method="post" action="{{ route('project.save') }}" id ="ProjForm" accept-charset="UTF-8" enctype='multipart/form-data'>
        @csrf
            <div class="tab-content container" id="nav-createContent">
                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel" aria-labelledby="nav-basic-tab" tabindex="0">
                    <x-project.create.details :data="$data"/>       
                </div>
                <div class="tab-pane fade" id="nav-reward" role="tabpanel" aria-labelledby="nav-reward-tab" tabindex="0">
                    <x-project.create.reward/>
                </div>
                <div class="tab-pane fade" id="nav-story" role="tabpanel" aria-labelledby="nav-story-tab" tabindex="0">
                    <x-project.create.story/>
                </div>
                <div class="tab-pane fade" id="nav-payment" role="tabpanel" aria-labelledby="nav-payment-tab" tabindex="0">
                    <x-project.create.paytab/> 
                </div>
            </div>
        </form>
    </div>
</div>
@endsection