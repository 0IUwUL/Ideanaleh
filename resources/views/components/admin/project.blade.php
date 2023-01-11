<div class="container-fluid mt-5">
    <label for="ProjectTable" class="admin_project_table">Project Table</label>
    <div class="row table-responsive px-3" id = "ProjectTable" style = "max-height: 40vh; overflow-y: scroll">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Project Number</th>
                    <th>Project Name</th>
                    <th>Developer Last Name</th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Done</a></li>
                            <li><a class="dropdown-item" href="#">In Progress</a></li>
                            <li><a class="dropdown-item" href="#">Halted</a></li>
                        </ul>
                    </th>
                    <th>Date Started</th>
                    <th>Target Date</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td><span class="admin_project project_IP">In Progress</span></td>
                    <td>12/06/2000</td>
                    <td>1/1/2022</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td><span class="admin_project project_success">Completed</span></td>
                    <td>12/06/2000</td>
                    <td>1/1/2022</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td><span class="admin_project project_halt">Halt</span></td>
                    <td>12/06/2000</td>
                    <td>1/1/2022</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ProjectFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteProjectModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <label for="ProjectIssueTable" class="admin_project_table mt-5">Project Issue Table</label>
    <div class="row table-responsive mt-3 px-3" id = "ProjectIssueTable" style = "max-height: 40vh; overflow-y: scroll">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Project Number</th>
                    <th>Project Name</th>
                    <th>Developer Last Name</th>
                    <th>Issue/Report</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Project</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteFlagModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
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
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
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
                        <div class="card-text table=responsive" style = "max-height: 30vh; overflow-y: scroll">
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