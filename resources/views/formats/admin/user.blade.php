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
        @if($role == 'admin')
            <td>{{$role}}</td>
            <td></td>
        @else 
            <td>
                <button type="button" class="changeStatus btn btn-outline-{{$user['active'] ? 'danger' : 'success'}}" data-bs-toggle="modal" data-bs-target="#ChangeStatusModal" data-id="{{$user['id']}}">
                    <i class="fa-solid fa-circle-{{$user['active'] ? 'xmark' : 'check'}}"></i>
                </button>
            </td>
            <td> 
                <button class="btn btn-outline-primary dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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