@extends('layouts.CreateProj')

@section('content')
<x-styles.defnav/>

<div class="project_body d-flex justify-content-center">
    <div class="col-9 rounded shadow border p-4 bg-light">
        <h2 class = "d-flex justify-content-center">Development Form</h2>
        <div class="col-8 mx-auto mt-5">
            <form method="post" action="{{ route('project.save') }}" accept-charset="UTF-8" enctype='multipart/form-data'>
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
                    <div class="col">
                        <label for="floatingProj">Target Project Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingProj" min="100" name = "ProjTarget" required>
                    </div>
                    <div class="w-100 d-block d-md-block d-lg-none mb-3"></div>
                    <div class="col">
                        <label for="floatingMileStone">Target Milestone Amount</label>
                        <input type="number" class = "form-control form-control-lg" id="floatingMileStone" min="100" name = "ProjMilestone" required>
                    </div>
                </div>
                <div class="row my-5 d-flex justify-content-start">
                    <div class="col col-xl-4 mb-4">
                        <label for="formBanner" class="form-label">Upload Project banner</label>
                        <input accept="image/*" class="form-control" name = "ProjBanner" type="file" id="formBanner" required>
                    </div>
                    <div class="w-100 d-block d-md-none"></div>
                    <div class="col col-xl-4 mb-4">
                        <label for="formLogo" class="form-label">Upload Image Logo</label>
                        <input accept="image/*" class="form-control" name = "ProjLogo"  type="file" id="formLogo">
                    </div>
                    <div class="w-100 d-block d-xl-none"></div>
                    <div class="col col-xl-4">
                        <label for="formVideo" class="form-label">Link Project Video Promo</label>
                        <input class="form-control" name = "ProjVideo"  type="text" id="formVideo">
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col mb-4">
                        <label for="floatingDate">Project Target Date</label>
                        <input type="date" class = "form-control form-control-lg" id="floatingDate" name = "ProjDate" required>
                    </div>
                    <div class="w-100 d-block d-xl-none"></div>
                    <div class="col">
                        <label for="CatgeoryForm" class="form-label">Datalist example</label>
                        <input class="form-control" list="CatOption" id="CatgeoryForm" placeholder="Add/Choose category">
                        <datalist id="CatOption">
                            <option value="San Francisco">
                            <option value="New York">
                            <option value="Seattle">
                            <option value="Los Angeles">
                            <option value="Chicago">
                        </datalist>
                    </div>
                </div>
                
                {{-- Note to future RamonDev: Add project milestone target -RamonDev --}}
                <div class="col-12 my-4">
                    <label>Tier List Titles</label>

                    <!-- Tier 1 -->
                    <div class="input-group mb-4">
                        <div class="input-group-text">
                            <!-- Tier 1 Checkbox -->
                            <div class="input-group-text">
                                <div class="form-check form-switch">
                                    <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Radio button for following text input" checked disabled>
                                </div>
                            </div>
                            
                            <label for="FirstTier" class = "mx-3">1st Tier</label>
                        </div>

                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[0][name]">
                        
                        <!-- Tier Amount -->
                        <span class="input-group-text">Tier Amount: </span>
                        <input required type="number" class="form-control" name = "Tier[0][amount]" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">

                        <!-- Tier 1 Benefits -->
                        <div class="input-group">
                            <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_1_benefits" name="Tier[0][benefits]" style="height: 7rem width: 15rem" required></textarea>
                        </div>
                    </div>
                    
                    <!-- Tier 2 -->
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <!-- Tier 2 Checkbox -->
                            <div class="input-group-text">
                                <div class="form-check form-switch">
                                    <input class="form-check-input mt-0" name="Tier2_toggle" id="Tier2_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                                </div>
                            </div>

                            <label for="SecondTier" class = "mx-3">2nd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[1][name]" id="Tier_2_title" aria-label="Text input with radio button" disabled/>

                        <!-- Tier 2 Amount -->
                        <span class="input-group-text">Tier Amount: </span>
                        <input type="number" class="form-control" name = "Tier[1][amount]" id="Tier_2_amount" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$"  disabled/>
                    
                        <!-- Tier 2 Benefits -->
                        <div class="input-group">
                            <textarea class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_2_benefits" name="Tier[1][benefits]" style="height: 7rem width: 15rem" disabled></textarea>
                        </div>
                    </div>

                    <!-- Tier 3 -->
                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <!-- Tier 3 checkbox -->
                            <div class="input-group-text">
                                <div class="form-check form-switch">
                                    <input disabled class="form-check-input mt-0" name="Tier3_toggle" id="Tier3_toggle" type="checkbox" value="" aria-label="Radio button for following text input">
                                </div>
                            </div>

                            <label for="ThirdTier" class = "mx-3">3rd Tier</label>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" name="Tier[2][name]" id="Tier_3_title" aria-label="Text input with radio button" disabled/>
                        
                        <!-- Tier 3 Amount -->
                        <span class="input-group-text">Tier Amount: </span>
                        <input disabled type="number" class="form-control" name="Tier[2][amount]" id="Tier_3_amount" placeholder="0.00" required min="10" max="300000" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$">
                    
                        <!-- Tier 3 Benefits -->
                        <div class="input-group">
                            <textarea disabled class="form-control" placeholder="Benefits for supporters in this tier" id="Tier_3_benefits" name="Tier[2][benefits]" style="height: 7rem width: 15rem" ></textarea>
                        </div>
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