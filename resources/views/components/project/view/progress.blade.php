<div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
    <button type="button" class="btn btn-success mx-lg-5 my-3" data-bs-toggle="modal" data-bs-target="#updateModal">Create update</button>
    
    <!-- Current progress accordion -->
    <div class="accordion accordion-flush pb-5 px-lg-5" id="info-update-accordion">
        <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5">
            <h2 class="font-weight-bold">Current Progress</h2>
            <div class="accordion-item" id="accordion-current-progress">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#info-update-acord-current" aria-expanded="true" aria-controls="info-update-acord-1">
                    <h4 class="accordion-header" id="progress-current-title">
                        {{empty($progress) ?  'Project started' :
                        $progress[0]['title'].' ('.date('F d, Y', strtotime($progress[0]['created_at'])).')' }}
                    </h4>
                </button>
                <div id="info-update-acord-current" class="accordion-collapse collapse show"
                    aria-labelledby="update-acord-current" data-bs-parent="#info-update-accordion">
                    <div class="accordion-body py-2" id="progress-current-description">              
                        {{empty($progress) ?  'The developer has just started the project' :
                        $progress[0]['description'] }}
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
            <div id = "previous-progress-accordion" >
                {{-- Get only 5 progress and break if empty --}}
                @for ($i = 1; $i <=5 ; $i++)
                    @php
                        if (empty($progress[$i])) break
                    @endphp
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#info-progress-acord-{{$i}}" aria-expanded="false" aria-controls="info-progress-acord-{{$i}}">
                            <h4 class="accordion-header" id="progress-acord-heading{{$i}}">
                                {{$progress[$i]['title']}} ({{date('F d, Y', strtotime($progress[$i]['created_at']))}})
                            </h4>
                        </button>
                        <div id="info-progress-acord-{{$i}}" class="accordion-collapse collapse"
                        aria-labelledby="progress-acord-heading{{$i}}" data-bs-parent="#info-progress-accordion">
                            <div class="accordion-body py-2">
                                <p>{{$progress[$i]['description']}}</p>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
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
            <form method="post" action="{{ route('progress.create') }}" accept-charset="UTF-8" id = "progressForm">
                @csrf
                <input type="hidden" name = "ProjectId" value = "{{$id}}"/>
                <div class="mb-3">
                    <label for="ProgressTitle" class="form-label">Title</label>
                    <input type="text" name = "ProgressTitle" class="form-control " id="progressTitle" required/>
                </div>
                <div class="mb-3">
                    <label for="ProgressDesc" class="form-label">Description</label>
                    <textarea name = "ProgressDesc" class="form-control h-75" id="progressDesc" required></textarea>
                </div>
            </div>
            <button type="button" id="progressSubmit" class="btn btn-primary mx-4 mb-4">Post</button>
        </form>
      </div>
    </div>
    </div>