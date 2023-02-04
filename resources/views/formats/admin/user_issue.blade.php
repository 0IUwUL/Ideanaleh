@foreach ($ArrArg as $issue)
    <tr>
        <td>{{$issue['id']}}</td>
        <td>{{$issue['username']['Lname']}}</td>
        <td>{{$issue['content']}}</td>
        <td>{{date('n/j/Y h:i:s A', strtotime($issue['created_at']))}}</td>
        <td><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#UserFlagModal" data-id=""><i class="fa-solid fa-flag"></i></button></td>
        <td><button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#ResolvedModal" data-id=""><i class="fa-solid fa-check"></i></button></td>
        <td><button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#DeleteIssueModal" data-id=""><i class="fa-solid fa-circle-xmark"></i></button></td>
    </tr>
@endforeach