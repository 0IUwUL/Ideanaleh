<div class="container-fluid mt-5">
    <label for="RequestTable" class="admin_user_table">User Request Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="req" placeholder="Search" id="" aria-label="Search" aria-describedby="" required>
            <button type="button" id="ReqSearch" class="input-group-text">
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
            <tbody id="req_table">
                @foreach ($requests as $request)
                    @if(!$request['is_resolved'])
                        <tr>
                            <td>{{$request['name']}}</td>
                            <td>{{$request['email']}}</td>
                            <td>{{$request['subject']}}</td>
                            <td class="content"><a class="truncate">{{$request['content']}}</a></td>
                            <td>{{$request['created_at']}}</td>
                            <td><button type="button" class="informUser btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-name="{{$request['name']}}" data-email="{{$request['email']}}"><i class="fa-solid fa-flag"></i></button></td>
                            <td><button type="button" class="resolveUserRequest btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedRequestModal" data-id="{{$request['id']}}" data-status={{$request['is_resolved']}}><i class="fa-solid fa-check"></i></button></td>
                            <td><button type="button" class="deleteUserRequest btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteRequestModal" data-id="{{$request['id']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <label for="RequestTable" class="admin_user_table mt-5">Resolved User Request Table</label>
    <div class="row py-3 col col-sm-6">
        <div class="input-group">
            <input type="text" class="form-control" name="resolve" placeholder="Search" id="" aria-label="Search" aria-describedby="" required>
            <button type="button" id="ResolvedUserSearch" class="input-group-text">
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
            <tbody id="resolve_table">
                @foreach ($requests as $request)
                    @if($request['is_resolved'])
                        <tr>
                            <td>{{$request['name']}}</td>
                            <td>{{$request['email']}}</td>
                            <td>{{$request['subject']}}</td>
                            <td class="content"><a class="truncate">{{$request['content']}}</a></td>
                            <td>{{$request['created_at']}}</td>
                            <td><button type="button" class="resolveUserRequest btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#ResolvedRequestModal" data-id="{{$request['id']}}" data-status={{$request['is_resolved']}}><i class="fa-solid fa-rotate"></i></button></td>
                            <td><button type="button" class="deleteUserRequest btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteRequestModal" data-id="{{$request['id']}}"><i class="fa-solid fa-circle-xmark"></i></button></td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="ResolvedRequestModal" tabindex="-1" aria-labelledby="ResolvedRequestModalLabel" aria-hidden="true">
    <form id="ResolvedRequestForm" action="" method="POST">
        @csrf
        @method('PATCH')
        <input type="hidden" id="request-status" name="status" value="" required>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="ResolvedRequestModalHeader">Is the request resolved? <i class="fa-solid fa-circle-check text-success"></i></h1>
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


<div class="modal fade" id="DeleteRequestModal" tabindex="-1" aria-labelledby="DeleteRequestModalLabel" aria-hidden="true">
    <form id="DeleteRequestForm" method="POST">
        @csrf
        @method('delete')
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="DeleteRequestModalHeader">Are you sure you want to delete this request? <i class="fa-solid fa-circle-xmark text-danger"></i></h1>
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

