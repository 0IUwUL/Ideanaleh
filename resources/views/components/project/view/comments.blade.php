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
                                        <li><button class="dropdown-item edit" type="button" data-bs-toggle="modal" data-bs-target="#editModal" data-id = {{$comment['id']}}>Edit</button></li>
                                        <li><button class="dropdown-item" data-commentId = {{$comment['id']}}>Delete</button></li>
                                    </ul>
                                </div>
                            
                                <div class="col px-4 mx-2 py-2" id="comment-{{$comment['id']}}">{{$comment['content']}}</div>
                            </div>
                        </div>
                @endforeach
            @endif
        </div> 
        
    </div>
</div>

<!-- Edit Comment Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-info">
            <form method="post" action="" accept-charset="UTF-8" id="editForm">
                @csrf
                <div class="modal-header bg-info text-white">
                    <h1 class="modal-title fs-3" id="LoginModalLabel">Edit Comment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <input id="CommentId" type="hidden" name="CommentId" value=""/>

                <div class="modal-body p-4">
                    <div class="mb-3" id="editInfo">
                        <textarea name = "ProjectComment" class="form-control" maxlength="200" id="edit-comment-box" placeholder="Write a comment..."required></textarea>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary saveChanges" >Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>