@foreach ($ArrArg as $proj)
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