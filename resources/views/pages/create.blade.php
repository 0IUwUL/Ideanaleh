@extends('layouts.default')

<x-styles.defnav/>


@section('content')
<div class="project_body d-flex justify-content-center">
    <div class="col-10 rounded shadow border p-5 bg-light">
        <h2 class = "d-flex justify-content-center">Development Form</h2>
        <div class="col-8 mx-auto mt-5">
            <form>
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
                        <label for="floatingTarget">Target Project Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingTarget" min="100" name = "ProjTarget" required>
                    </div>
                    <div class="col-5">
                        <label for="floatingTarget">Target Milestone Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingTarget" min="100" name = "ProjTarget" required>
                    </div>
                </div>
                <div class="row my-5 d-flex justify-content-start">
                    <div class="col-5 mb-3">
                        <label for="formFile" class="form-label">Upload Project banner</label>
                        <input class="form-control" name = "ProjBanner" type="file" id="formFile" required>
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Upload Image Logo</label>
                        <input class="form-control" name = "ProjLogo"  type="file" id="formFile">
                    </div>
                    <div class="col-5 mt-3">
                        <label for="formFile" class="form-label">Link Project Video Promo</label>
                        <input class="form-control" name = "ProjVideo"  type="file" id="formFile">
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
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "FirstTier" aria-label="Checkbox for following text input">
                            <label for="FirstTier" class = "mx-3">1st Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "SecondTier" aria-label="Checkbox for following text input">
                            <label for="SecondTier" class = "mx-3">2nd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0" type="checkbox" value="" id = "ThirdTier" aria-label="Checkbox for following text input">
                            <label for="ThirdTier" class = "mx-3">3rd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox">
                    </div>
                </div>
                <div class="form-floating mb-3 col-6">
                    <textarea class="form-control" placeholder="Eg: #AI, #Agriculture, #IT..." name = "ProjTags" id="floatingTags" style="height: 100px" required></textarea>
                    <label for="floatingTags">Enter Desired Tags</label>
                </div>
                
                <div class="col d-flex justify-content-end">
                    <button class = "btn btn-primary btn-lg" type = "submit">Submit</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection