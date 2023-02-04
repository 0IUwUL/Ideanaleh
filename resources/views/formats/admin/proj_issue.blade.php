@foreach ($ArrArg as $issue)
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