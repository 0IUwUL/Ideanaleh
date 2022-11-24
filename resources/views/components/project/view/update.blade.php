<div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
    <button type="button" class="btn btn-success mx-lg-5 my-3" data-bs-toggle="modal" data-bs-target="#updateModal">Create update</button>
    @if (empty($progress))
        <!-- No progress accordion -->
        <div class="accordion accordion-flush pb-5 px-lg-5" id="info-update-accordion">
            <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5">
                <div class="accordion-item">
                    <div id="info-update-acord-current" class="accordion-collapse collapse show"
                        aria-labelledby="update-acord-current" data-bs-parent="#info-update-accordion">
                        <div class="accordion-body py-2 text-center">
                            <h3> No progress peee peee puuu puuuu</h3>
                            <!-- by RamonDevs -->
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    @else
        <!-- Current progress accordion -->
        <div class="accordion accordion-flush pb-5 px-lg-5" id="info-update-accordion">
            <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5">
                <h2 class="font-weight-bold">Current Progress</h2>
                <div class="accordion-item">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#info-update-acord-current" aria-expanded="true" aria-controls="info-update-acord-1">
                        <h4 class="accordion-header" id="update-acord-current">
                            Progress Title (Date)
                        </h4>
                    </button>
                    <div id="info-update-acord-current" class="accordion-collapse collapse show"
                        aria-labelledby="update-acord-current" data-bs-parent="#info-update-accordion">
                        <div class="accordion-body py-2">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem eius dolore veritatis cupiditate itaque natus velit dignissimos exercitationem. Atque pariatur voluptates ut repudiandae sapiente minima! Officiis libero modi corrupti neque.</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        
        @if(count($progress) > 1)
        <!-- Progress list accordion -->
        <div class="accordion accordion-flush px-lg-5" id="info-progress-accordion">
            <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                <h2 class="font-weight-bold">Progress List</h2>
                @foreach($data['categories'] as $category)
                <div class="accordion-item">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#info-progress-acord-1" aria-expanded="false" aria-controls="info-progress-acord-2">
                        <h4 class="accordion-header" id="progress-acord-heading1">
                            Progress Title (Date)
                        </h4>
                    </button>
                    <div id="info-progress-acord-1" class="accordion-collapse collapse"
                    aria-labelledby="progress-acord-heading1" data-bs-parent="#info-progress-accordion">
                        <div class="accordion-body py-2">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur hic omnis optio distinctio, a nobis, quam aliquam explicabo animi, eum sit! Recusandae maiores, eos adipisci vitae inventore ipsa neque incidunt.</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="accordion-item">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#info-progress-acord-2" aria-expanded="false" aria-controls="info-progress-acord-2">
                        <h4 class="accordion-header" id="progress-acord-heading2">
                            Progress Title (Date)
                        </h4>
                    </button>
                    <div id="info-progress-acord-2" class="accordion-collapse collapse"
                    aria-labelledby="progress-acord-heading2" data-bs-parent="#info-progress-accordion">
                        <div class="accordion-body py-2">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur hic omnis optio distinctio, a nobis, quam aliquam explicabo animi, eum sit! Recusandae maiores, eos adipisci vitae inventore ipsa neque incidunt.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endif
</div>

<!-- Modal-->
<div class="modal p-0" id="updateModal" data-btn="updateModalGSI"tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info text-white">
          <h1 class="modal-title fs-3" id="updateModalLabel">Create update</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form method="post" action="{{ route('login-user') }}" accept-charset="UTF-8" id = "updateForm">
                @csrf
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Title</label>
                    <input type="text" name = "address" class="form-control " id="updateTitle" required/>
                    <span class = "error" id = "err_mail"></span>
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Description</label>
                    <textarea name = "address" class="form-control h-75" id="updateDesc" required></textarea>
                    <span class = "error" id = "err_mail"></span>
                </div>
            </div>
            <button type="button" id="updateSubmit" class="btn btn-primary mx-4 mb-4">Post</button>
        </form>
      </div>
    </div>
    </div>