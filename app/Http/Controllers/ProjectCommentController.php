<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectComments;

use Auth;
use Input;
use App\Events\NewCommentCreated;

class ProjectCommentController extends Controller
{

    public function edit(int $id): void
    {
        $comment = ProjectComments::find($id);

        $json_data = array("status" => "error");

        if($comment) $json_data = array("status" => "success");

        echo json_encode($json_data);
    }

    public function store(Request $request): void
    {
        $newComment = new ProjectComments;
        $newComment->user_id = Auth::id();
        $newComment->proj_id = $request->ProjectId;
        $newComment->content = $request->ProjectComment;
        $newComment->save();

        $user = array(
            'Fname' => Auth::user()->Fname, 
            'Mname' => Auth::user()->Mname, 
            'Lname' => Auth::user()->Lname,
            'icon' => Auth::user()->icon);
        $result = array_merge($newComment->toArray(), $user);

        // Store html blade for ajax response with render()
        $viewRender = view('formats.comment')->with('comment', $result)->render();

        $json_data = array("commentHTML" => $viewRender);
        
        // broadcast the new comment to other users
        broadcast(new NewCommentCreated($viewRender, $newComment->proj_id))->toOthers();

        echo json_encode($json_data);
    }

    public function update(ProjectComments $comment, Request $request): void
    {
        $comment->content = $request->ProjectComment;
        $comment->save();

        $date = date('n/j/Y h:i:s A', strtotime($comment->updated_at));

        $json_data = array("commentDate" => $date);

        echo json_encode($json_data);
    }

    public function destroy(int $id): void
    {
        $comment = ProjectComments::find($id);
        
        $comment?->delete();
    }

    public function getComments(int $projectId): ?array
    {
        return ProjectComments::getAll($projectId);
    }

}
