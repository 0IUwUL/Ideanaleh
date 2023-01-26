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
                                    <a class="text-decoration-none d-flex flex-row pe-auto text-dark" href={{url('profile/'.$comment['user_id'])}}>
                                        <img class="avatar mr-2" src="{{asset('storage/'.$icon)}}">
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold">{{$comment['Fname'].' '.$comment['Mname'].' '.$comment['Lname']}} </div>
                                            <div class="text-secondary" id="comment-{{$comment['id']}}-date">
                                                {{date('n/j/Y h:i:s A', strtotime($comment['updated_at']))}}
                                                @if($comment['updated_at'] > $comment['created_at'])
                                                    (Edited)
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    @if(Auth::check() && (Auth::user()->id == $comment['user_id'] || Auth::user()->id == $comment['dev_id']))
                                        <button type="button" class="btn circle ms-auto align-self-center" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis"></i></button>
                                        <ul class="dropdown-menu">
                                            <!-- Show only the edit button to the comment owner -->
                                            @if(Auth::user()->id == $comment['user_id'])
                                                <li><button class="dropdown-item edit" type="button" data-id = {{$comment['id']}}>Edit</button></li>
                                            @endif
                                            <li><button class="dropdown-item delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id  = {{$comment['id']}}>Delete</button></li>
                                            
                                        </ul>
                                    @endif
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
                    <button type="button" class="btn btn-primary saveChanges" disabled>Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Delete Comment Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h1 class="modal-title fs-3" id="LoginModalLabel">Delete Comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <input id="deleteCommentId" type="hidden" name="deleteCommentId" value=""/>

            <div class="modal-body">
                <h5 class="fw-bold">Are you sure you want to delete this comment?</h5>
                <div class="mb-3" id="deleteBody">
                    
                    <div class="col-10 mx-auto my-2 comment" id="commentPreview"> 
                        
                    </div>
                </div>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger confirmDelete" >Delete</button>
            </div>
            
        </div>
    </div>
</div>

<div aria-live="polite" aria-atomic="true" class="toast-container align-items-center mt-5 position-fixed bottom-0 end-0">
    <div class="DevToast toast" role="alert" id = "DevToast" aria-live="assertive" aria-atomic="true">
      <div class="toast-header bg-danger text-white">
        <strong class="me-auto">System</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body bg-dark text-white d-flex justify-content-start">
        The comment does not exist
      </div>
    </div>
</div> 