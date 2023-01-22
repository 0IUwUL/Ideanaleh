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
        <div class="col-8 col-md-10 col-sm-10 px-5 py-0">
            <div class="tab-content pb-5" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                    <x-admin.dashboard/>
                </div>
                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" tabindex="0">
                    <x-admin.user :users="$admin['users']" :issues="$admin['user_issues']"/>
                </div>
                <div class="tab-pane fade"  id="v-pills-projects" role="tabpanel" aria-labelledby="v-pills-projects-tab" tabindex="0">
                    <x-admin.project/>
                </div>
            </div>
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

<div class="modal fade" id="DeleteProjectModal" tabindex="-1" aria-labelledby="DeleteProjectModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
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
        <div class="modal-dialog modal-dialog-centered">
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

<div class="modal fade" id="HaltProjectModal" tabindex="-1" aria-labelledby="HaltProjectModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="HaltProjectModalHeader">Are you sure to halt this issue on the project? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
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
@endsection