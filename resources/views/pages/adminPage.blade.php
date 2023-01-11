@extends('layouts.admin')

@section('content')
<x-styles.adminnav/>

<div class="container-fluid admin_page">
    <div class="row">
        <div class = "p-0 col-2" data-side-holder>
            <aside class="sidebar open fixed-top" data-side-bar>
                <div class="top_sidebar">
                    <a href="#" class="admin_logo" alt = "logo"><img src="{{asset('storage/avatars/default.png')}}"></a>
                    <div class="hidden_name">Ideanaleh</div>
                </div>
                <div class="middle_sidebar">
                    <div class="container-fluid p-0 admin_list">
                        <ul class="col-1 nav flex-column admin_list m-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li class="admin_nav_list">
                                <a class="nav-link sidebar_link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="fa-solid fa-house sidebar_icon"></i>
                                    <div class="hidden_name">Home</div>
                                </a>
                            </li>
                            <li class="admin_nav_list">
                                <a class="nav-link sidebar_link" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">
                                    <i class="fa-solid fa-users-gear sidebar_icon"></i>
                                    <div class="hidden_name">Users</div> 
                                </a>
                            </li>
                            <li class="admin_nav_list">
                                <a class="nav-link sidebar_link" id="v-pills-projects-tab" data-bs-toggle="pill" data-bs-target="#v-pills-projects" type="button" role="tab" aria-controls="v-pills-projects" aria-selected="false">
                                    <i class="fa-solid fa-rectangle-list sidebar_icon"></i>
                                    <div class="hidden_name">Projects</div> 
                                </a>
                            </li>
                            <li class="admin_nav_list">
                                <a class = "nav-link sidebar_link" type = "submit" href="{{ route('logout') }}">
                                    <i class="fa-regular fa-share-from-square sidebar_icon"></i>
                                    <div class="hidden_name">Logout</div> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
        <!-- Dashboard -->
        <div class="col p-0">
            <div class="tab-content pb-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                    <x-admin.dashboard/>
                </div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                    <x-admin.user/>
                </div>
                <div class="tab-pane fade"  id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab" tabindex="0">
                    <x-admin.project/>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="modal fade" id="FlagModal" tabindex="-1" aria-labelledby="FlagModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-warning">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="FlagModalHeader">Inform the issue to the developer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="mb-3">
                <label for="LabelSubject" class="form-label">Subject</label>
                <input type="text" name = "" class="form-control" id="FormControlLabelSubject">
            </div>
            <div class="mb-3">
                <label for="LabelContentIssue" class="form-label">Message Content</label>
                <textarea class="form-control" name = "" id="FormControlLabelContentIssue" rows="3"></textarea>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send to Developer</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="UserFlagModal" tabindex="-1" aria-labelledby="UserFlagModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content border-warning">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="UserFlagModalHeader">Inform the issue to the user</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="">
              <div class="mb-3">
                  <label for="LabelSubject" class="form-label">Subject</label>
                  <input type="text" name = "" class="form-control" id="FormControlLabelSubject">
              </div>
              <div class="mb-3">
                  <label for="LabelContentIssue" class="form-label">Message Content</label>
                  <textarea class="form-control" name = "" id="FormControlLabelContentIssue" rows="3"></textarea>
              </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send to Developer</button>
        </div>
          </form>
      </div>
    </div>
  </div>


<div class="modal fade" id="ResolvedModal" tabindex="-1" aria-labelledby="ResolvedModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolvedModalHeader">Is the issue resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>


<div class="modal fade" id="DeleteIssueModal" tabindex="-1" aria-labelledby="DeleteIssueModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteIssueModalHeader">Are you sure to delete this issue? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="DeactivateModal" tabindex="-1" aria-labelledby="DeactivateModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeactivateModalHeader">You will now deactivate this current account. <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="ActivateModal" tabindex="-1" aria-labelledby="ActivateModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ActivateModalHeader">You will now activate this current account. <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteModalHeader">Are you sure to delete this user? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="DeleteFlagModal" tabindex="-1" aria-labelledby="DeleteFlagModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteFlagModalHeader">Are you sure to delete this issue? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="DeleteProjectModal" tabindex="-1" aria-labelledby="DeleteProjectModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteProjectModalHeader">Are you sure to delete this project? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>

<div class="modal fade" id="ProjectFlagModal" tabindex="-1" aria-labelledby="ProjectFlagModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog">
            <div class="modal-content border-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ProjectFlagModalHeader">Assign status for the project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Status
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">In Progress</a></li>
                          <li><a class="dropdown-item" href="#">Completed</a></li>
                          <li><a class="dropdown-item" href="#">Halt</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
    </form>
            </div>
        </div>
</div>
@endsection