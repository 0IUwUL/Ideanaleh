<div class="container-fluid mt-5">
    <label for="ProjectTable" class="admin_project_table">Project Table</label>
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
                            <li><a class="dropdown-item" href="#">Done</a></li>
                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                            <li><a class="dropdown-item" href="#">Halted</a></li>
                        </ul>
                    </th>
                    <th class="align-middle">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!count($projects) == 0)
                @foreach ($projects as $proj)
                <tr>
                    <td>{{$proj['id']}}</td>
                    <td>{{$proj['title']}}</td>
                    <td>{{$proj['username']['Lname']}}</td>
                    <td>{{$proj['created_at']}}</td>
                    <td>{{$proj['target_date']}}</td>
                    <td><span class="admin_project project_IP text-nowrap">In Progress</span></td>
                    {{-- <td><span class="admin_project project_success">Completed</span></td> --}}
                    {{-- <td><span class="admin_project project_halt">Halt</span></td> --}}
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
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
            <tbody>
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
                                    <tr>
                                        <th scope = "col">1</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">2</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">3</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">4</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">5</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
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
                                    <tr>
                                        <th scope = "col">1</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">2</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">3</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">4</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                    <tr>
                                        <th scope = "col">5</th>
                                        <th scope = "col">Mark</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>