<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects; 

class FilterProjects extends Controller
{
    public function index()
    {
        $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->get()
                                    ->toArray();
        return view('pages.display_projects')->with('ProjArg', $projectDataVar);
    }
}
