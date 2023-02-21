@foreach ($ArrArg as $request)
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