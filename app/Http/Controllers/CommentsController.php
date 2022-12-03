<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectComments;

use Auth;
use DB;

class CommentsController extends Controller
{
    public function getAllProjectComments(int $id)
    {
        $query = json_decode(
            json_encode(
                DB::table('project_comments')
                    ->where('project_comments.proj_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->join('users', 'project_comments.user_id', '=', 'users.id')
                    ->join('projects', 'project_comments.proj_id', '=', 'projects.id')
                    ->select('project_comments.*','users.id as user_id', 'users.Lname', 'users.Fname', 'users.Mname', 'users.icon', 'projects.user_id as dev_id')
                    ->get() 
                    ->toArray()
            ),
            true);
        //$query = ProjectComments::where('proj_id', $id)->orderBy('created_at', 'desc')->with('user')->get();
        //$phone = ProjectComments::find(1)->user->toArray();
        
        if ($query) return $query;

        return null;
    }

    public function createProjectComment(Request $request)
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

        echo json_encode($json_data);
    }

    public function editProjectComment(Request $request)
    {
        ProjectComments::where('id', $request->CommentId)->update(['content' => $request->ProjectComment]);
        $comment =  ProjectComments::find($request->CommentId);
        $date = date('n/j/Y h:i:s A', strtotime($comment->updated_at));

        $json_data = array("commentDate" => $date);

        echo json_encode($json_data);
    }

    public function deleteProjectComment(Request $request)
    {
        // Delete by ID
        ProjectComments::destroy($request->CommentId);

        $json_data = array("response" => "success");

        echo json_encode($json_data);
    }

}
