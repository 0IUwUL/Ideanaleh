<div class="container-fluid mt-5">
    <label for="TableUser" class="admin_user_table">User Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="user" placeholder="Search by last name or email" id="" aria-label="Search" aria-describedby="" required>
            <button type="button" id="UserSearch" class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="row admin_table">
        <table class="table table-responsive align-middle table-hover" id = "admin_user_table">
            <thead class="table-dark sticky-top">
                <tr>
                    <th class="align-middle">User Number</th>
                    <th class="align-middle">Last Name</th>
                    <th class="align-middle">Email</th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Role
                        </button>
                        <ul class="role dropdown-menu" >
                            <li><a class="dropdown-item">All</a></li>
                            <li><a class="dropdown-item ">User</a></li>
                            <li><a class="dropdown-item">Developer</a></li>
                            <li><a class="dropdown-item">Admin</a></li>
                        </ul>
                    </th>
                    <th class="align-middle">Registered At</th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </button>
                        <ul class="status dropdown-menu">
                            <li><a class="dropdown-item">All</a></li>
                            <li><a class="dropdown-item">Active</a></li>
                            <li><a class="dropdown-item">Deactivated</a></li>
                        </ul>
                    </th>
                    <th class="align-middle">Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="user_table">
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['Lname']}}</td>
                        <td>{{$user['email']}}</td>
                        @php
                            if ($user['admin'])
                                $role = 'admin';
                            else if ($user['dev_mode'])
                                $role = 'developer';
                            else 
                                $role = 'user';
                        @endphp
                        <td class="admin_type admin_{{$role}} {{$user['active'] ? 'Active': 'Deactivated'}}">{{ucfirst($role)}}</td>
                        <td>{{date('n/j/Y', strtotime($user['created_at']))}}</td>
                        <td><span class="admin_status {{$role.' admin_'}}{{$user['active'] ? 'active': 'deactive'}}" >{{$user['active'] ? 'Active' : 'Deactivated' }}</span></td> 
                        @if($role == 'admin')
                            <td></td>
                            <td></td>
                        @else 
                            <td><button type="button" class="changeStatus btn btn-outline-{{$user['active'] ? 'danger' : 'success'}}" data-bs-toggle="modal" data-bs-target="#ChangeStatusModal" data-id="{{$user['id']}}">
                                    <i class="fa-solid fa-circle-{{$user['active'] ? 'xmark' : 'check'}}"></i>
                                </button>
                            </td>
                            <td> <button class="btn btn-outline-primary dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user-pen"></i>
                                </button>
                                <ul class="changeRole dropdown-menu">
                                    <li><button class="dropdown-item d-flex justify-content-between" {{$role == 'user' ? 'disabled' : ""}}  data-bs-toggle="modal" data-bs-target="#ChangeRoleModal" data-id={{$user['id']}} data-name="{{$user['Fname'].' '.$user['Lname']}}">User</button></li>
                                    <li><button class="dropdown-item d-flex justify-content-between" {{$role == 'developer' ? 'disabled' : ""}} data-bs-toggle="modal" data-bs-target="#ChangeRoleModal" data-id={{$user['id']}} data-name="{{$user['Fname'].' '.$user['Lname']}}">Developer</button></li>
                                    <li><button class="dropdown-item d-flex justify-content-between" {{$role == 'admin' ? 'disabled' : ""}} data-bs-toggle="modal" data-bs-target="#ChangeRoleModal" data-id={{$user['id']}} data-name="{{$user['Fname'].' '.$user['Lname']}}">Admin</button></li>
                                </ul> 
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <label for="TableUserIssue" class="admin_user_table mt-5">User Issue Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="user_issue" placeholder="Search by last name" aria-label="Search" aria-describedby="" required>
            <button type="button" id="UserIssueSearch" class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="row table-responsive mt-3 px-3 admin_table">
        <table class="table align-middle table-hover">
            <thead class="table-dark sticky-top">
                <tr>
                    <th class="py-3">User Number</th>
                    <th class="py-3">Last Name</th>
                    <th class="py-3">Issue/Report</th>
                    <th class="py-3">Date</th>
                    <th class="py-3">Action</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="user_issue_table">
                @foreach ($issues as $issue)
                    @if (!$issue['is_resolved'])
                        <tr>
                            <td>{{$issue['user_id']}}</td>
                            <td>{{$issue['username']['Lname']}}</td>
                            <td class="content"><a class="truncate">{{$issue['content']}}</a></td>
                            <td>{{date('n/j/Y h:i:s A', strtotime($issue['created_at']))}}</td>
                            <td><button type="button" class="informUser btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-name="{{$issue['username']['Fname']}}" data-email="{{$issue['username']['email']}}"><i class="fa-solid fa-flag"></i></button></td>
                            <td><button type="button" class="resolveUserIssue btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id="{{$issue['id']}}" data-status={{$issue['is_resolved']}}><i class="fa-solid fa-check"></i></button></td>
                            <td><button type="button" class="deleteUserIssue btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id="{{$issue['id']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <label for="TableResolvedUserIssue" class="admin_user_table mt-5">Resolved User Issue Table</label>
    <div class="row table-responsive mt-3 px-3 admin_table">
        <table class="table align-middle table-hover">
            <thead class="table-dark sticky-top">
                <tr>
                    <th class="py-3">User Number</th>
                    <th class="py-3">Last Name</th>
                    <th class="py-3">Issue/Report</th>
                    <th class="py-3">Date</th>
                    <th class="py-3">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id = "ResolvedUserIssue">
                @foreach ($issues as $issue)
                    @if ($issue['is_resolved'])
                        <tr>
                            <td>{{$issue['user_id']}}</td>
                            <td>{{$issue['username']['Lname']}}</td>
                            <td class="content"><a class="truncate">{{$issue['content']}}</a></td>
                            <td>{{date('n/j/Y h:i:s A', strtotime($issue['created_at']))}}</td>
                            <td><button type="button" class="resolveUserIssue btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id="{{$issue['id']}}" data-status={{$issue['is_resolved']}}><i class="fa-solid fa-rotate"></i></button></td>
                            <td><button type="button" class="deleteUserIssue btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id="{{$issue['id']}}" ><i class="fa-solid fa-circle-xmark"></i></button></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  



<div class="modal fade" id="ResolvedModal" tabindex="-1" aria-labelledby="ResolvedModalLabel" aria-hidden="true">
    <form action="{{route('resolve-user-issue')}}" method="POST">
        @csrf
        <input type="hidden" id="resolve-id" name="id" value="" required>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolvedModalHeader">Is the issue resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
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


<div class="modal fade" id="DeleteIssueModal" tabindex="-1" aria-labelledby="DeleteIssueModalLabel" aria-hidden="true">
    <form action="{{route('delete-user-issue')}}" method="POST">
        @csrf
        <input type="hidden" id="delete-id" name="id" value="" required>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteIssueModalHeader">Are you sure to delete this issue? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="ChangeStatusModal" tabindex="-1" aria-labelledby="ChangeStatusModalLabel" aria-hidden="true">
    <form id="changeStatusForm" action="{{route('change-status')}}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-danger">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ChangeStatusModalHeader">You will now deactivate this current account. <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input id="user-id" type="hidden" name="user_id" value=""/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="ChangeRoleModal" tabindex="-1" aria-labelledby="ChangeRoleLabel" aria-hidden="true">
    <form id="ChangeRoleForm" action="{{route('change-role')}}" method="POST">
        @csrf
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ChangeRoleHeader"><i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" id="change-role-id" name="user_id" value="" required>
                <input type="hidden" id="new-role" name="role" value="" required>
                <div class="m-3 alert alert-warning" role="alert" id="ChangeRoleNote">Warning: This action cannot be undone</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>
