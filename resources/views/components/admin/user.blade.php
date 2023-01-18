<div class="container-fluid mt-5">
    <label for="TableUser" class="admin_user_table">User Table</label>
    <div class="row table-responsive px-3" id = "admin_user_table">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th>User Number</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Role
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">User</a></li>
                            <li><a class="dropdown-item" href="#">Developer</a></li>
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                        </ul>
                    </th>
                    <th class="dropwdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Status
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Activated</a></li>
                            <li><a class="dropdown-item" href="#">Deactivated</a></li>
                        </ul>
                    </th>
                    <th>Registered At</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_user">User</span></td> 
                    <td><span class="admin_status admin_active">Activated</span></td> 
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeactivateModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_developer">Developer</span></td> 
                    <td><span class="admin_status admin_active">Activated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeactivateModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_developer">Developer</span></td> 
                    <td><span class="admin_status admin_active">Activated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeactivateModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_admin">Admin</span></td> 
                    <td><span class="admin_status admin_active">Activated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeactivateModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_admin">Admin</span></td>
                    <td><span class="admin_status admin_deactive">Deactivated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ActivateModal" data-id=""><i class="fa-solid fa-circle-check"></i></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_user">User</span></td>
                    <td><span class="admin_status admin_deactive">Deactivated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ActivateModal" data-id=""><i class="fa-solid fa-circle-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td><span class="admin_role admin_developer">Developer</span></td>
                    <td><span class="admin_status admin_deactive">Deactivated</span></td>
                    <td>12/06/2000</td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ActivateModal" data-id=""><i class="fa-solid fa-circle-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#DeleteModal" data-id=""><i class="fa-solid fa-trash-arrow-up"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <label for="TableUserIssue" class="admin_user_table mt-5">User Issue Table</label>
    <div class="row table-responsive mt-3 px-3">
        <table class="table align-middle table-hover">
            <thead class="table-dark">
                <tr>
                    <th>User Number</th>
                    <th>Last Name</th>
                    <th>Issue/Report</th>
                    <th>Action</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>sdfgfdagweradgasdgaserawdgahfhaetrawfasdgawefweaa</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>