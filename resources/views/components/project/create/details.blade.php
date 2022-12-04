<div class="row mt-3 mb-5 text-center">
    <h1>Project Details</h1>
    <p class = "fs-5">Ensure that people can easily learn about your project.</p>
</div>
<div class="row">
    <div class="col-5 p-3 my-auto">
        <h3>
            Project Details
        </h3>
        <section class="mt-4 fs-6">
            To help people quickly understand your project, write a concise, clear title and subtitle. Project Title and Project
            Description will be visible on your project.
            <br>
            Potential backers will be able to see this whenever they would search, results in categories, etc.
        </section>
    </div>
    <div class="col-7 px-3">
        <div class="mb-3">
            <label for="Title">Project Title</label>
            @if(array_key_exists('project', $data))
            <input type="hidden" id=ProjectId name="ProjId" value='{{$data['project']['id']}}'>
            @endif
            <input type="text" class="form-control" id="Title" name = "ProjTitle" 
                placeholder="Title Here..." 
                value = "{{array_key_exists('project', $data) ? $data['project']['title'] : ''}}"
                required
            >
        </div>
        <div class="mb-3">
            <label for="Desc">Project Description</label>
            <textarea class="form-control" placeholder="Short project description..." name = "ProjDesc" id="Desc" style="height: 150px"  required>{{array_key_exists('project', $data) ? $data['project']['title'] : ''}}</textarea>
            <section class="d-flex justify-content-end">
                <span id ="limit">0</span><span>/200</span>
            </section>
            
        </div>
    </div>
</div>
<hr class = "create">
<div class="row my-4">
    <div class="col-5 p-3 my-auto">
        <h3>
            Project Category
        </h3>
        <section class="mt-4 fs-6">
            This will help potential backers to easily locate your project.
            <br>
            Please choose an appopriate category for your project.
        </section>
    </div>
    <div class="col-7">
        <label for="CatgeoryForm" class="form-label">Project Category</label>
        <select class="form-select" id="CatgeoryForm" name="ProjCategory" aria-label="Default select example" placeholder="Add/Choose category" required>
            <option selected disabled value="">Choose category...</option>
            @foreach($data['categories'] as $category)
                <option value="{{$category}}" {{array_key_exists('project', $data) ? $data['project']['category'] == $category ? 'selected' : '' : ''}}>{{$category}}</option>
            @endforeach
        </select>
    </div>
</div>
<hr class= "create">
<div class="row my-4">
    <div class="col-5 p-3 my-auto">
        <h3>
            Project Goals
        </h3>
        <section class="mt-4 fs-6">
            This will help backers see the target amount of your project.
        </section>
    </div>
    <div class="col-7 px-3 my-auto">
        <div class="mb-3">
            {{-- Note to future RamonDev: Add project milestone target -RamonDev --}}
           <label for="floatingMileStone">Target Milestone Amount</label>
           <input type="number" class = "form-control form-control-lg" id="floatingMileStone" min="100" max = "100000" name = "ProjMilestone" 
                value = {{array_key_exists('project', $data) ? $data['project']['target_milestone'] : ''}}
                required
           >
       </div>
        <div class="mb-3">
            <label for="floatingProj">Target Project Amount</label>
            <input type="number" class = "form-control form-control-lg" id="floatingProj" min="100" max = "100000" name = "ProjTarget" 
                value = {{array_key_exists('project', $data) ? $data['project']['target_amt'] : ''}}
                required
            >
        </div>
    </div>
</div>
<hr class = "create">
<div class="row my-4">
    <div class="col-5">
        <h3>
            Project Image
        </h3>
        <section class="mt-4 fs-5">
            Include a picture that effectively conveys your project. Choose a design that works well in a variety of sizes because it will be used on your project's page, 
            the Kickstarter website, mobile apps, and (when shared) social media platforms.
        </section>
    </div>
    <div class="col-7 px-3 my-auto">
        <div class="col mb-4">
            <label for="formBanner" class="form-label">Upload Project banner</label>
            <input accept="image/*" class="form-control" name = "ProjBanner" type="file" id="formBanner" {{array_key_exists('project', $data) ? '' : 'required'}}>
        </div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col mb-4">
            <label for="formLogo" class="form-label">Upload Image Logo</label>
            <input accept="image/*" class="form-control" name = "ProjLogo"  type="file" id="formLogo" {{array_key_exists('project', $data) ? '' : 'required'}}>
        </div>
        <div class="w-100 d-block d-xl-none"></div>
        <div class="col">
            <label for="formVideo" class="form-label">Link Project Video Promo (optional)</label>
            <input class="form-control" name = "ProjVideo"  type="text" id="formVideo" value = {{array_key_exists('project', $data) ? 'https://youtu.be/'.$data['project']['yt_link'] : ''}}>
        </div>
    </div>
    
</div>
<hr class = "create">
<div class="row my-4">
    <div class="col-5">
        <h3>
            Target Date
        </h3>
        <section class="mt-4 fs-5">
            This date can be changed up until the point at which you manually launch your project.
        </section>
    </div>
    <div class="col-7 mb-4">
        <label for="floatingDate">Project Target Date</label>
        <input type="date" class = "form-control form-control-lg" min="{{now()->format('Y-m-d')}}" id="floatingDate" name = "ProjDate" 
            value="{{array_key_exists('project', $data) ? date('Y-m-d', strtotime($data['project']['target_date'])) : ''}}"
            required
        >
    </div>
</div>
<hr class= "create">
<div class="row my-4">
    <div class="col-5">
        <h3>
            Project Tag
        </h3>
        <section class="mt-4 fs-5">
            Input tags which makes your project unique from other projects under the same category.
        </section>
    </div>
    <div class="col-7 d-flex justify-content-center">
        <div class="form-floating my-5 col">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Enter desired tags:</h3>
                    <button type="button" class="btn-close Tool" id = "clear_tags" title="Clear tags" aria-label="Close"></button>
                </div>
                <div class="card-body">
                    <div class="card-title">Use <strong>comma (,)</strong> to seperate each tag. <br><br> <span class="text-danger">*Insert at least three tags</span> </div>
                    <div class="tags">
                        @if(array_key_exists('project', $data))
                        @foreach(explode(',', $data['project']['tags']) as $tag)
                            <span class = "tag">
                                {{$tag}}
                                <input type="hidden" name="Tags[]" value="{{$tag}}">
                                <span class="remove-tag" onclick="removeTag(this, '{{$tag}}')">x</span>
                            </span>
                        @endforeach
                        @endif
                           <input type="text" placeholder="Add tags...">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                  <span class="current-tag"> </span>/ <span class="max-tags"></span>
                </div>
            </div>
        </div>
    </div>
</div> 
<div class="col d-flex justify-content-end">
    <button type ="button" data-next = "reward" class="tab_next btn btn-primary">Next</button>
</div>