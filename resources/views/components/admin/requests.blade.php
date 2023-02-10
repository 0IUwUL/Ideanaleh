<div class="container-fluid mt-5">
    <label for="RequestTable" class="admin_user_table">User Request Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="user" placeholder="Search" id="" aria-label="Search" aria-describedby="" required>
            <button type="button" id="UserSearch" class="input-group-text">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="row table-responsive">
        <table class="table align-middle table-hover" id = "RequestTable">
            <thead class="table-dark sticky-top">
                <tr>
                    <th class="align-middle">Name</th>
                    <th class="align-middle">Email</th>
                    <th class="align-middle">Subject</th>
                    <th class="align-middle">Content</th>
                    <th class="align-middle">Sent At</th>
                    <th class="align-middle">Actions</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="request_table">
                <tr>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td>Bugs on System</td>
                    <td class="content"><a class="truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis ex quod incidunt recusandae fuga, dolorem quae eum ea sunt porro maiores? Voluptates et minima laboriosam aut. Molestias sit error eius.</a></td>
                    <td>12/06/2023</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#RequestFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#RequestResolveModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteRequestModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
                <tr>
                    <td>Mark</td>
                    <td>mark@gmail.com</td>
                    <td>Bugs on System</td>
                    <td class="content"><a class="truncate">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis ex quod incidunt recusandae fuga, dolorem quae eum ea sunt porro maiores? Voluptates et minima laboriosam aut. Molestias sit error eius. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae qui quis repellendus unde voluptatum asperiores nostrum quidem dignissimos, reiciendis maiores! Dignissimos quidem porro facere. Impedit fugit sit id at itaque!</a></td>
                    <td>12/06/2023</td>
                    <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#RequestFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
                    <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#RequestResolveModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
                    <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteRequestModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>