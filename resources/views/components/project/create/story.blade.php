<div class="row d-flex justify-content-center mt-3 mb-5 text-center">
    <h1>Additional Information</h1>
    <p class = "fs-5">Design your campaign tab which displays and elaborate background reason of your project, display contacts, etc.</p>

    <textarea class="form-control ckeditor" placeholder="Short project description..." name = "ProjStory" id="Story" rows='4'>{{array_key_exists('project', $data) ? array_key_exists('story', $data['project']) ? $data['project']['story'] : '' : ''}}</textarea>
</div>

<div class="col d-flex justify-content-between">
    <button type ="button" data-next = 'reward' class="tab_next btn btn-danger">Previous</button>
    <button type ="button" data-next = 'payment' class="tab_next btn btn-primary">Next</button>
</div>