<div class="container-fluid mt-5">
    <label for="PendingProjectTable" class="admin_project_table">Pending Projects</label>
    
    <div class="row admin_table" id = "PendingProjectTable">
        <table class="table table-responsive align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="align-middle">Project Number</th>
                    <th class="align-middle">Project Name</th>
                    <th class="align-middle">Developer Last Name</th>
                    <th class="align-middle">Date Started</th>
                    <th class="align-middle">Target Date</th>
                    <th></th>
                    <th class="align-middle">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id = "pending_proj_table">
                @if (!count($projects) == 0)
                @foreach ($projects as $proj)
                    @if ($proj['status'] == 'Pending')
                    <tr id="PendingProject{{$proj['id']}}">
                        <td>{{$proj['id']}}</td>
                        <td>{{$proj['title']}}</td>
                        <td>{{$proj['username']['Lname']}}</td>
                        <td>{{$proj['created_at']}}</td>
                        <td>{{$proj['target_date']}}</td>

                        <td>
                            <a href="{{ url('project/view/'.$proj['id']) }}" target="_blank">
                                <button title="View Project" type="button" class="btn btn-outline-dark"  data-id=""><i class="fa-solid fa-eye"></i></button>
                            </a>
                        </td>
                        <td><button title="Approve Project" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ApproveProjectModal" data-id="{{$proj['id']}}" data-title="{{$proj['title']}}" data-user="{{$proj['username']['Lname']}}"><i class="fa-solid fa-check"></i></button></td>
                        <td><button title="Deny Project" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DenyProjectModal" data-id="{{$proj['id']}}" data-title="{{$proj['title']}}" data-user="{{$proj['username']['Lname']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                    </tr>
                    @endif
                @endforeach
                @else
                <tr>
                    <td>null</td>
                    <td>No Projects Found</td>
                    <td>null</td>
                    <td>null</td>
                    <td>null</td>
                    <td><span class="admin_project project_IP text-nowrap">null</span></td>
                    <td><button disabled type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button disabled type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <label for="ProjectTable" class="admin_project_table">Project Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="proj" placeholder="Search" id="" aria-label="Search" aria-describedby="" required>
            <button type="submit" id="ProjSearch" class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="row admin_table" id = "ProjectTable">
        <table class="table table-responsive align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="align-middle">Project Number</th>
                    <th class="align-middle">Project Name</th>
                    <th class="align-middle">Developer Last Name</th>
                    <th class="align-middle">Date Started</th>
                    <th class="align-middle">Target Date</th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Pending</a></li>
                            <li><a class="dropdown-item" href="#">Done</a></li>
                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                            <li><a class="dropdown-item" href="#">Halted</a></li>
                        </ul>
                    </th>
                    <th></th>
                    <th class="align-middle">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id = "proj_table">
                @if (!count($projects) == 0)
                @foreach ($projects as $proj)
                <tr>
                    <td>{{$proj['id']}}</td>
                    <td>{{$proj['title']}}</td>
                    <td>{{$proj['username']['Lname']}}</td>
                    <td>{{$proj['created_at']}}</td>
                    <td>{{$proj['target_date']}}</td>
                    <td>
                        {{-- Find a better way to solve this --}}
                        @if ($proj['status'] == "Halt")
                            <span id="Project{{$proj['id']}}Status" class="admin_project project_halt text-nowrap" >
                        @elseif($proj['status'] == "In Progress")
                            <span id="Project{{$proj['id']}}Status" class="admin_project project_inprogress text-nowrap" >
                        @elseif($proj['status'] == "Pending")
                            <span id="Project{{$proj['id']}}Status" class="admin_project project_pending text-nowrap" >
                        @else
                            <span id="Project{{$proj['id']}}Status" class="admin_project project_denied text-nowrap" >
                        @endif
                            {{$proj['status']}}
                        </span>
                    </td>

                    <td>
                        <a href="{{ url('project/view/'.$proj['id']) }}" target="_blank">
                            <button title="View Project" type="button" class="btn btn-outline-dark"  data-id=""><i class="fa-solid fa-eye"></i></button>
                        </a>
                    </td>
                    <td><button title="Assign Status" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id="{{$proj['id']}}" data-title="{{$proj['title']}}" data-user="{{$proj['username']['Lname']}}"><i class="fa-solid fa-flag"></i></button></td>
                    <td><button title="Halt Project" type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#HaltProjectModal" data-id="{{$proj['id']}}" data-title="{{$proj['title']}}" data-user="{{$proj['username']['Lname']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>null</td>
                    <td>No Projects Found</td>
                    <td>null</td>
                    <td>null</td>
                    <td>null</td>
                    <td><span class="admin_project project_IP text-nowrap">null</span></td>
                    <td><button disabled type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button disabled type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

    <label for="ProjectIssueTable" class="admin_project_table mt-5">Project Issue Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="proj_issue" placeholder="Search" id="" aria-label="Search" aria-describedby="" required>
            <button type="submit" id ="ProjIssueSearch" class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="row table-responsive mt-3 px-3 admin_table" id = "ProjectIssueTable">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th class="py-3">Project Number</th>
                    <th class="py-3">Project Name</th>
                    <th class="py-3">Developer Last Name</th>
                    <th class="py-3">Issue/Report</th>
                    <th class="py-3">Action</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id = "proj_issue_table">
                @if (!count($issues)==0)
                @foreach ($issues as $issue)
                <tr>
                    <td>{{$issue['project']['id']}}</td>
                    <td>{{$issue['project']['title']}}</td>
                    <td>{{$issue['username']['Lname']}}</td>
                    <td>{{$issue['content']}}</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectIssueFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#HaltProjectModal" data-id=""><i class="fa-solid fa-hand"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td>null</td>
                    <td>null</td>
                    <td>null</td>
                    <td>No Issues Found</td>
                    <td><button disabled type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectIssueFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button disabled type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#HaltProjectModal" data-id=""><i class="fa-solid fa-hand"></i></button></td>
                    <td><button disabled type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        Top Supported Projects
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: auto">
                            <table class="table">
                                <thead class = "table-dark sticky-top">
                                    <tr>
                                        <th scope = "col">#</th>
                                        <th scope = "col">(Title)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top['donations'] as $key => $project )
                                    <tr>
                                        <th scope = "col">{{$key +1}}</th>
                                        <th scope = "col">{{$project['title']}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title text-center">
                        Top Genre Supported
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: auto">
                            <table class="table">
                                <thead class = "table-dark sticky-top">
                                    <tr>
                                        <th scope = "col">#</th>
                                        <th scope = "col">(Genre)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($top['categories'] as $key => $category)
                                    <tr>
                                        <th scope = "col">{{$key + 1}}</th>
                                        <th scope = "col">{{$category['name']}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>