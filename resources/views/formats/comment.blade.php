<div class="col-6 mx-auto my-2 comment" id="project-comment-{{$comment['id']}}"> 
    <div class="row flex-column">
        @php
            if($comment['icon']){
                $icon = $comment['icon'];
            } else{
                $icon = 'avatars/default.png';
            }
        @endphp
        <div class="px-4 py-2 col d-flex">
            <img class="avatar mr-2" src="{{asset('storage/'.$icon)}}">
            <div class="d-flex flex-column">
                <div class="fw-bold">{{$comment['Fname'].' '.$comment['Mname'].' '.$comment['Lname']}} </div>
                <div class="text-secondary" id="comment-{{$comment['id']}}-date">{{date('n/j/Y h:i:s A', strtotime($comment['updated_at'])) }}</div>
            </div>
            <button type="button" class="btn circle ms-auto align-self-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
            <ul class="dropdown-menu">
                <li><button class="dropdown-item edit" type="button" data-id = {{$comment['id']}}>Edit</button></li>
                <li><button class="dropdown-item delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id = {{$comment['id']}}>Delete</button></li>
            </ul>
        </div>
    
        <div class="col px-4 mx-2 py-2" id="comment-{{$comment['id']}}">{{$comment['content']}}</div>
    </div>
</div>