<div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
    <div class="container-md py-3">
        @if(Auth::check())
        <!-- Comment input-->
        <div class="col-6 mx-auto my-2 comment"> 
            <div class="row flex-column">
                <div class="px-4 py-2 col fw-bold">
                    @php
                        if(Auth::user()->icon){
                            $icon = Auth::user()->icon;
                        } else{
                            $icon = 'avatars/default.png';

                        }
                    @endphp
                    <img class="avatar mr-2" src="{{asset('storage/'.$icon)}}">
                    {{ Auth::user()->Fname.' '.Auth::user()->Mname.' '.Auth::user()->Lname}}  
                </div>
                <form id="testForm">
                    <input id="ProjectId" type="hidden" name="ProjectId" value="{{$id}}"/>
                    <div class="col px-3 py-2">
                        <textarea name = "ProjectComment" class="form-control" maxlength="200" id="comment-box" placeholder="Write a comment..."required></textarea>
                    </div>
                </form>
            </div>
        </div>
        @elseif (empty($comments))
            <h2 class="text-center font-bold p-5">
                No Comments
            </h2>
        @endif
        
        <div class="d-flex flex-column justify-content-center" id="commentsList">
            @if (!empty($comments))
            
                <!-- Comments -->
                @foreach($comments as $index => $comment)
                    @php
                        if ($index > 5) break;
                    @endphp
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
                @endforeach
            @endif
        </div> 
        
    </div>
</div>