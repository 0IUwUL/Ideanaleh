@foreach ($ArrArg as $user)
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