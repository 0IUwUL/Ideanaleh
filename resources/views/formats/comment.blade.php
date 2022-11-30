<div class="col-6 mx-auto my-2 comment"> 
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
                <div>{{'('.date('F d, Y', strtotime($comment['created_at'])).')' }}</div>
            </div>
        </div>
    
        <div class="col px-4 mx-2 py-2">
            {{$comment['content']}}
        </div>
    </div>
</div>