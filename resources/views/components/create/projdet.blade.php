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
        <select class="form-select" id="CatgeoryForm" aria-label="Default select example" placeholder="Add/Choose category">
            <option value="AI">Artificial Intelligence</option>
            <option value="Agri">Agriculture</option>
            <option value="Business">Business</option>
            <option value="Games">Games</option>
            <option value="IOT">Internet of Things</option>
            <option value="Comm">Communication</option>
            <option value="Medical">Medical</option>
            <option value="Transpo">Transportation</option>
            <option value="Edu">Education</option>
            <option value="Sec">Security</option>
            <option value="VR/AR">Virtual/Augmented Reality</option>
            <option value="Music">Music</option>
            <option value="Others">Others</option>
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
            <label for="floatingProj">Target Project Amount</label>
            <input type="number" class = "form-control form-control-lg" id="floatingProj" min="100" name = "ProjTarget" required>
        </div>
        <div class="mb-3">
             {{-- Note to future RamonDev: Add project milestone target -RamonDev --}}
            <label for="floatingMileStone">Target Milestone Amount</label>
            <input type="number" class = "form-control form-control-lg" id="floatingMileStone" min="100" name = "ProjMilestone" required>
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
            <input accept="image/*" class="form-control" name = "ProjBanner" type="file" id="formBanner" required>
        </div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col mb-4">
            <label for="formLogo" class="form-label">Upload Image Logo</label>
            <input accept="image/*" class="form-control" name = "ProjLogo"  type="file" id="formLogo">
        </div>
        <div class="w-100 d-block d-xl-none"></div>
        <div class="col">
            <label for="formVideo" class="form-label">Link Project Video Promo</label>
            <input class="form-control" name = "ProjVideo"  type="text" id="formVideo">
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
        <input type="date" class = "form-control form-control-lg" id="floatingDate" name = "ProjDate" required>
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
    </div>
</div> 
<div class="col d-flex justify-content-end">
    <button type ="button" data-next = "reward" class="tab_next btn btn-primary">Next</button>
</div>