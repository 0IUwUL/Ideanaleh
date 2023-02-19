<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\UserDeactivation;
use App\Services\EmailService;
use App\Services\AdminService;

use App\Models\User;
use App\Models\Projects;
use App\Models\Payments;
use App\Models\UserIssue;
use App\Models\ProjectIssue;
use App\Models\UserRequest;

class AdminController extends Controller
{
    public function index(): Object
    {
        $data = [
            'users' => User::all()?->toArray(),
            'projects' => Projects::with(['username', 'proj_stat'])->get()->toArray(),
            'user_issues' => UserIssue::with(['username'])?->get()->toArray(),
            'project_issues' => ProjectIssue::with(['project','username'])->get()->toArray(),
            'user_requests' => UserRequest::all()->toArray(),
        ];

        $data['top']['donations'] = (new AdminService)->getTopProjects(10, 'donation_count');
        $data['top']['categories'] = (new AdminService)->getTopSupportedCategory();

        $data['dashboard'] = (new AdminService)->getResults($data['projects']);
        // dd($data);   
        return view('pages.admin')->with('admin', $data);
    }

    public function searchUser(Request $request): void
    {
        $input = $request->input;
        $for = $request->for;
        if(is_null($input) && $for)
            $result = (new AdminService)->getDefaultTable($for);
        elseif($for == 'user')
            $result = (new AdminService)->getUserTable($input);
        elseif($for == 'user_issue')
            $result = (new AdminService)->getUserIssueTable($input);
        elseif($for == 'proj')
            $result = (new AdminService)->getProjectTable($input);
        elseif($for == 'proj_issue')
            $result = (new AdminService)->getProjIssueTable($input);
        
        $viewRender = view('formats.admin.'.$for)->with(['ArrArg' => $result])->render();
        $json_data = array('item' => $viewRender, 'for'=>$for);
        echo json_encode($json_data);
        
    }

    
    public function changeStatus(Request $request): Object
    {
        $user = User::find($request->user_id);
        
        if ($user->active)
            $user->active = 0; 
        else 
            $user->active = 1;
            
        $user->save();

        $user->notify(new UserDeactivation($user));

        return redirect()->back();
    }

    public function informUser(Request $request): Object
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->content;
        
        (new EmailService)->inform($name, $email, $subject, $message);

        return redirect()->back();
    }

    public function resolveUserIssue(Request $request): Object
    {
        $issue = UserIssue::find($request->id);
        
        if ($issue->is_resolved)
            $issue->is_resolved = 0; 
        else 
            $issue->is_resolved = 1;
            
        $issue->save();

        return redirect()->back();
    }

    public function deleteUserIssue(Request $request): Object
    {
        UserIssue::find($request->id)?->delete();
        
        return redirect()->back();
    }

    public function changeUserRole(Request $request): Object
    {
        $user = User::find($request->user_id);

        if  ($request->role == "User")
            $user->dev_mode = 0;

        if  ($request->role == "Developer")
            $user->dev_mode = 1;

        if  ($request->role == "Admin"){
            $user->dev_mode = 1;
            $user->admin = 1;    
        }

        $user->save();

        return redirect()->back();
    }
}
