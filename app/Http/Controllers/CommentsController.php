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
                    ->where('project_comments.proj_id',1)
                    ->orderBy('created_at', 'desc')
                    ->join('users', 'project_comments.user_id', '=', 'users.id')
                    ->select('project_comments.*','users.id as user_id', 'users.Lname','users.Fname','users.Mname','users.icon')
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

    // public function create(Request $request)
    // {
    //     $newComment = new ProjectComments;
    //     $newComment->user_id = Auth::id();
    //     $newComment->proj_id = $request->ProjectId;
    //     $newComment->description = $request->ProjectComment;
    //     $newComment->save();
    //     $newComment = $newProgress->toArray();
        
    //     return redirect("project/view/".$request->ProjectId);
    // }
}
