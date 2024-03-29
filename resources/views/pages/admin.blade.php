@extends('layouts.admin')

@section('content')
<x-styles.adminnav/>

<div class="container-fluid admin_page">
    <div class="row d-flex justify-content-evenly">
        <div class = "p-0 col-2" data-side-holder>
            <aside class="sidebar open fixed-top" data-side-bar>
                <div class="top_sidebar">
                    <a href="{{ route('admin') }}" class="admin_logo" alt = "logo"><img src="{{asset('storage/avatars/default.png')}}"></a>
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
                                <a class="nav-link sidebar_link" id="v-pills-requests-tab" data-bs-toggle="pill" data-bs-target="#v-pills-requests" type="button" role="tab" aria-controls="v-pills-requests" aria-selected="false">
                                    <i class="fa-solid fa-envelopes-bulk sidebar_icon"></i>
                                    <div class="hidden_name">Requests</div> 
                                </a>
                            </li>
                            <li class="admin_nav_list">
                                <a class="nav-link sidebar_link" id="v-pills-logs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-logs" type="button" role="tab" aria-controls="v-pills-logs" aria-selected="false">
                                    <i class="fa-solid fa-warehouse sidebar_icon"></i>
                                    <div class="hidden_name">Activity</div> 
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
        <div class="col-8 col-md-10 col-sm-10 px-3 py-0">
            <div class="tab-content pb-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                    <x-admin.dashboard :details="$admin['dashboard']"/>
                </div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                    <x-admin.user :users="$admin['users']" :issues="$admin['user_issues']"/>
                </div>
                <div class="tab-pane fade"  id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab" tabindex="0">
                    <x-admin.project :projects="$admin['projects']" :issues="$admin['project_issues']" :top="$admin['top']"/>
                </div>
                <div class="tab-pane fade"  id="v-pills-requests" role="tabpanel" aria-labelledby="v-pills-requests-tab" tabindex="0">
                    <x-admin.requests :requests="$admin['user_requests']"/>
                </div>
                <div class="tab-pane fade"  id="v-pills-logs" role="tabpanel" aria-labelledby="v-pills-logs-tab" tabindex="0">
                    <x-admin.logs/>
                </div>
            </div>
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
            <form action="{{route('inform-user')}}" method="POST">
                @csrf
                <input type="hidden" id="user-name" name="name" value="" required>
                <input type="hidden" id="user-email" name="email" value="" required>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="LabelSubject" class="form-label">Subject</label>
                        <input type="text" name = "subject" class="form-control" id="FormControlLabelSubject">
                    </div>
                    <div class="mb-3">
                        <label for="LabelContentIssue" class="form-label">Message Content</label>
                        <textarea class="form-control" name = "content" id="FormControlLabelContentIssue" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Send to Developer</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
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
        <div class="modal-dialog modal-dialog-centered">
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


{{-- Modal for Assigning a new Status for a Project --}}
<div class="modal fade" id="ProjectFlagModal" tabindex="-1" aria-labelledby="ProjectFlagModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ProjectFlagModalHeader">Assign status for the project</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 id="FlagModalProjectTitle">Title Here</h2>
                    <h5 id="FlagModalProjectCreator">By: </h5>
                    <div class="dropdown">
                        <input hidden disabled id="ProjectFlagModalInput" type="text" value="">
                        <button class="btn btn-secondary dropdown-toggle" id="ProjectFlagModalButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Set Status
                        </button>
                        <ul id="ProjectModalFlagDropDown" class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">In Progress</a></li>
                          <li><a class="dropdown-item" href="#">Denied</a></li>
                          <li><a class="dropdown-item" href="#">Completed</a></li>
                          <li><a class="dropdown-item" href="#">Halt</a></li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="FlagModalSubmitButton" data-id="">Assign</button>
                </div>
    </form>
            </div>
        </div>
</div>


{{-- Halt Project Modal --}}
<div class="modal fade" id="HaltProjectModal" tabindex="-1" aria-labelledby="HaltProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="HaltProjectModalHeader">Halt this Project?</h1>
                </div>
                <div class="modal-body">
                    <h2 id="HaltModalProjectTitle">Title Here</h2>
                    <h5 id="HaltModalProjectCreator">By: </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="HaltModalSubmitButton" data-id="">Halt</button>
                </div>
            </div>
        </div>
</div>


{{-- Approve Project Modal --}}
<div class="modal fade" id="ApproveProjectModal" tabindex="-1" aria-labelledby="ApproveProjectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ApproveProjectModalHeader">Approve this Project?</h1>
                </div>
                <div class="modal-body">
                    <h2 id="ApproveModalProjectTitle">Title Here</h2>
                    <h5 id="ApproveModalProjectCreator">By: </h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" id="ApproveModalSubmitButton" data-id="">Approve</button>
                </div>
            </div>
        </div>
</div>


{{-- Deny Project Modal --}}
<div class="modal fade" id="DenyProjectModal" tabindex="-1" aria-labelledby="DenyProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="DenyProjectModalHeader">Are you sure to DENY this project?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 id="DenyModalProjectTitle">Title Here</h2>
                <h5 id="DenyModalProjectCreator">By: </h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="DenyModalSubmitButton">Deny</button>
            </div>
        </div>
    </div>
</div>


{{-- Modal for Resolving and Reopening a Project Issue --}}
<div class="modal fade" id="ResolveProjectIssueModal" tabindex="-1" aria-labelledby="ResolveProjectIssueModalLabel" aria-hidden="true">
    <form action="{{route('resolve-project-issue')}}" method="POST">
        @csrf
        <input type="hidden" id="resolve-id-project-issue" name="id" value="" required>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolveProjectIssueModalHeader">Is the project issue resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>


{{-- Modal for Setting up the Contents of the email informing the user of their Project Issue --}}
<div class="modal fade" id="InformProjectIssueModal" tabindex="-1" aria-labelledby="InformProjectIssueModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-warning">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="InformProjectIssueModalHeader">Inform the Project Issue to the User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('inform-user')}}" method="POST">
                @csrf
                
                
                <div class="modal-body">
                    <div class="mb-3">
                        <h5 id="project-issue-display-name">username-here</h5>
                        <input type="hidden" id="project-issue-user-name" name="name" value="" required>
                        <h5 id="project-issue-display-email">email-here</h5>
                        <input type="hidden" id="project-issue-user-email" name="email" value="" required>
                    </div>
                    <div class="mb-3">
                        <label for="LabelSubject" class="form-label">Subject</label>
                        <input type="text" name = "subject" class="form-control" id="FormControlLabelSubject">
                    </div>
                    <div class="mb-3">
                        <label for="LabelContentIssue" class="form-label">Message Content</label>
                        <textarea class="form-control" name = "content" id="FormControlLabelContentIssue" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Send to Developer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection