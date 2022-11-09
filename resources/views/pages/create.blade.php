@extends('layouts.CreateProj')

<x-styles.defnav/>


@section('content')
<div class="project_body d-flex justify-content-center">
    <div class="col-10 rounded shadow border p-5 bg-light">
        <h2 class = "d-flex justify-content-center">Development Form</h2>
        <div class="col-8 mx-auto mt-5">
            <form method="post" action="{{ route('save-created-project') }}" accept-charset="UTF-8")>
            @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingTitle" name = "ProjTitle" placeholder="Title Here..." required>
                    <label for="floatingTitle">Project Title</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Short project description..." name = "ProjDesc" id="floatingDesc" style="height: 150px" required></textarea>
                    <label for="floatingDesc">Project Description</label>
                </div>
                <div class="row my-5 d-flex justify-content-start">
                    <div class="col-5">
                        <label for="floatingProj">Target Project Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingProj" min="100" name = "ProjTarget" required>
                    </div>
                    <div class="col-5">
                        <label for="floatingMileStone">Target Milestone Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingMileStone" min="100" name = "ProjMilestone" required>
                    </div>
                </div>
                <div class="row my-5 d-flex justify-content-start">
                    <div class="col-5 mb-3">
                        <label for="formBanner" class="form-label">Upload Project banner</label>
                        <input accept="image/*" class="form-control" name = "ProjBanner" type="file" id="formBanner" required>
                    </div>
                    <div class="col-4">
                        <label for="formLogo" class="form-label">Upload Image Logo</label>
                        <input accept="image/*" class="form-control" name = "ProjLogo"  type="file" id="formLogo">
                    </div>
                    <div class="col-5 mt-3">
                        <label for="formVideo" class="form-label">Link Project Video Promo</label>
                        <input class="form-control" name = "ProjVideo"  type="text" id="formVideo">
                    </div>
                </div>
                <div class="col-4 mb-5">
                    <label for="floatingDate">Project Target Date</label>
                    <input type="date" class = "form-control form-control-lg" id="floatingDate" name = "ProjDate" required>
                </div>
                <div class="col-8 my-3">
                    <label>Tier List Titles</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "FirstTier" aria-label="Checkbox for following text input" required>
                            <label for="FirstTier" class = "mx-3">1st Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[0][name]">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "SecondTier" aria-label="Checkbox for following text input">
                            <label for="SecondTier" class = "mx-3">2nd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[1][name]">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "ThirdTier" aria-label="Checkbox for following text input">
                            <label for="ThirdTier" class = "mx-3">3rd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[2][name]">
                    </div>
                </div>
                <div class="form-floating my-5 col-8">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Enter desired tags:</h3>
                            <button type="button" class="btn-close Tool" id = "clear_tags" title="Clear tags" aria-label="Close"></button>
                        </div>
                        <div class="card-body">
                            <div class="card-title">Use <strong>comma (,)</strong> to seperate each tag</div>
                            <div class="tags">
                                   <input type="text" placeholder="Add tags...">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                          <span class="current-tag"> </span>/ <span class="max-tags"></span>
                        </div>
                    </div>
                </div>
                
                <div class="col d-flex justify-content-end">
                    <button class = "btn btn-primary btn-lg" type = "submit">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection