<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectIssue;

class ProjectIssueController extends Controller
{
    public function reportProject(Request $request): Object
    {
        $issue = ProjectIssue::create($request->all());
        
        return redirect()->back();
    }
}
