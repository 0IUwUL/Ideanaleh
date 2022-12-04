<div class="tab-pane fade " id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab">
    <div class="container col-8">
        @if(Auth::check() && Auth::user()->id == $dev)
        <button type="button" class="btn btn-success mx-lg-5 mt-3" data-bs-toggle="modal" data-bs-target="#updateModal">Create update</button>
        @endif
        <!-- Current update accordion -->
        <div class="accordion accordion-flush pb-5 px-lg-5 mt-3" id="info-update-accordion">
            <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5">
                <h2 class="font-weight-bold">Current Update</h2> 

                <div class="accordion-item" id="accordion-current-update">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#info-update-acord-current" aria-expanded="true" aria-controls="info-update-acord-1">
                        <h4 class="accordion-header d-flex" >
                            <div id="update-current-title">{{$updates[0]['title'] ?? 'Project started'}}</div>
                            <div id="update-current-date">{{$updates? ' ('.date('F d, Y', strtotime($updates[0]['created_at'])).')' : ''}}</div>
                        </h4>
                        
                        <input type="hidden" id="update-current-id" value={{$updates ? $updates[0]['id'] : ''}}>
                        <div class="ms-auto dropdown" id="update-current-dropdown">
                            @if(Auth::check() && Auth::user()->id == $dev && $updates)
                            
                            
                                <a class="btn circle ms-auto align-self-center " data-bs-toggle="dropdown" aria-expanded="false" disabled><i class="fa-solid fa-ellipsis"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item editCurrentUpdate" type="button" data-bs-toggle="modal" data-bs-target="#updateEditModal" data-type="current">Edit</a></li>
                                    <li><a class="dropdown-item deleteUpdate" type="button" data-bs-toggle="modal" data-bs-target="#updateDeleteModal" data-type="current">Delete</a></li>
                                </ul>
                            
                            @endif
                        </div>
                    </button>
                    
                    <div id="info-update-acord-current" class="accordion-collapse collapse show"
                        aria-labelledby="update-acord-current" data-bs-parent="#info-update-accordion">
                        <div class="accordion-body py-2" id="update-current-description">              
                            {{empty($updates) ?  'The developer has just started the project' :
                            $updates[0]['description'] }}
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        @if(count($updates) > 1)
        <!-- update list accordion -->
        <div class="accordion accordion-flush px-lg-5" id="update-list-accordion">
            <div class="accordion-item-container py-2 px-0 px-sm-2 px-md-3 px-lg-5  mb-4">
                <h2 class="font-weight-bold">Update List</h2>
                <div id = "previous-update-accordion" >
                    {{-- Get only 5 update and break if empty --}}
                    @for ($i = 1; $i <=5 ; $i++)
                        @php
                            if (empty($updates[$i])) break
                        @endphp
                        <div class="accordion-item" id="previous-update-{{$updates[$i]['id']}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#info-update-acord-{{$updates[$i]['id']}}" aria-expanded="false" aria-controls="info-update-acord-{{$i}}">
                                <h4 class="accordion-header d-flex" >
                                    <div id="update-title-{{$updates[$i]['id']}}">{{$updates[$i]['title']}}</div>
                                    <div id="update-date-{{$updates[$i]['id']}}">{{'('.date('F d, Y', strtotime($updates[$i]['created_at'])).')'}}</div>
                                </h4>
                                @if(Auth::check() && Auth::user()->id == $dev)
                                <div class="ms-auto dropdown">
                                    <a class="btn circle ms-auto align-self-center " data-bs-toggle="dropdown" aria-expanded="false" disabled><i class="fa-solid fa-ellipsis"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item editUpdate" type="button" data-bs-toggle="modal" data-bs-target="#updateEditModal" data-type="previous" data-id={{$updates[$i]['id']}}>Edit</a></li>
                                        <li><a class="dropdown-item deleteUpdate" type="button" data-bs-toggle="modal" data-bs-target="#updateDeleteModal" data-type="previous" data-id={{$updates[$i]['id']}}>Delete</a></li>
                                    </ul>
                                </div>
                                @endif
                            </button>
                            <div id="info-update-acord-{{$updates[$i]['id']}}" class="accordion-collapse collapse"
                            aria-labelledby="update-acord-content-{{$updates[$i]['id']}}" data-bs-parent="#update-list-accordion">
                                <div class="accordion-body py-2" id="update-desc-{{$updates[$i]['id']}}">
                                    {{$updates[$i]['description']}}
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        @endif


    </div>
    
    
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
            <form accept-charset="UTF-8" id = "updateForm">
                <input type="hidden" name = "ProjectId" value = "{{$id}}"/>
                <div class="mb-3">
                    <label for="updateTitle" class="form-label">Title</label>
                    <input type="text" name = "UpdateTitle" class="form-control " maxlength="50" id="updateTitle" required/>
                </div>
                <div class="mb-3">
                    <label for="updateDesc" class="form-label">Description</label>
                    <textarea name = "UpdateDesc" class="form-control h-75" rows="4" cols="50" maxlength="200" id="updateDesc" required></textarea>
                </div>
            </div>
            <button type="button" id="updateSubmit" class="btn btn-primary mx-4 mb-4">Post</button>
        </form>
      </div>
    </div>
</div>

<!-- Edit Modal-->
<div class="modal p-0" id="updateEditModal" data-btn="updateEditModalGSI"tabindex="-1" aria-labelledby="updateEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-info">
        <div class="modal-header bg-info text-white">
          <h1 class="modal-title fs-3" id="updateEditModalLabel">Edit update</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-4">
            <form accept-charset="UTF-8" id = "updateEditForm">
                <input type="hidden" name = "UpdateEditId" id="updateEditId"/>
                <input type="hidden" name = "UpdateEditType" id="updateEditType"/>
                <div class="mb-3">
                    <label for="updateTitle" class="form-label">Title</label>
                    <input type="text" name = "UpdateEditTitle" class="form-control " maxlength="50" id="updateEditTitle" required/>
                </div>
                <div class="mb-3">
                    <label for="updateDesc" class="form-label">Description</label>
                    <textarea name = "UpdateEditDesc" class="form-control h-75" rows="4" cols="50" maxlength="200" id="updateEditDesc" required></textarea>
                </div>
            </div>
            <button type="button" id="updateEditSubmit" class="btn btn-primary mx-4 mb-4">Save Changes</button>
        </form>
      </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal p-0" id="updateDeleteModal" data-btn="updateDeleteModalGSI"tabindex="-1" aria-labelledby="updateDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-3" id="updateDeleteModalLabel">Delete update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <input type="hidden" name = "UpdateDeleteId" id="updateDeleteId"/>
            <input type="hidden" name = "UpdateDeleteType" id="updateDeleteType"/>
            <div class="modal-body p-4">
                <h5 class="fw-bold text-center">Are you sure you want to delete this update?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="updateDeleteSubmit">Delete</button>
            </div>
        </div>
    </div>
</div>