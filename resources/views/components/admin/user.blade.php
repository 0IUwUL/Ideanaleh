<div class="container-fluid mt-5">
    <label for="TableUser" class="admin_user_table">User Table</label>
    <div class="row admin_table" id = "admin_user_table">
        <table class="table table-responsive align-middle table-hover">
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
            <tbody id="user_list">
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
                        <td><button type="button" class="changeStatus btn btn-outline-{{$user['active'] ? 'danger' : 'success'}}" data-bs-toggle="modal" data-bs-target="#ChangeStatusModal" data-id="{{$user['id']}}">
                                <i class="fa-solid fa-circle-{{$user['active'] ? 'xmark' : 'check'}}"></i>
                            </button>
                        </td>
                        <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <label for="TableUserIssue" class="admin_user_table mt-5">User Issue Table</label>
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
            <tbody>
                @foreach ($issues as $issue)
                    <tr>
                        <td>{{$issue['user_id']}}</td>
                        <td>{{$issue['username']['Lname']}}</td>
                        <td>{{$issue['content']}}</td>
                        <td>{{date('n/j/Y h:i:s A', strtotime($issue['created_at']))}}</td>
                        <td><button type="button" class="informUser btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id="{{$issue['user_id']}}"><i class="fa-solid fa-flag"></i></button></td>
                        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id="{{$issue['id']}}"><i class="fa-solid fa-check"></i></button></td>
                        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id="{{$issue['id']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
            <form action="{{route('inform-user')}}" method="POST">
                @csrf
                <input type="hidden" id="dev-id" name="user_id" value="" required>
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


<div class="modal fade" id="ResolvedModal" tabindex="-1" aria-labelledby="ResolvedModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolvedModalHeader">Is the issue resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>


<div class="modal fade" id="DeleteIssueModal" tabindex="-1" aria-labelledby="DeleteIssueModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteIssueModalHeader">Are you sure to delete this issue? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
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

<div class="modal fade" id="ActivateModal" tabindex="-1" aria-labelledby="ActivateModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ActivateModalHeader">You will now activate this current account. <i class="fa-solid fa-circle-check text-success"></i></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </form>
</div>
