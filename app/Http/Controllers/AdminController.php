<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UserIssue;

class AdminController extends Controller
{
    public function index(): Object
    {
        $data = [
            'users' => User::all()?->toArray(),
            'user_issues' => UserIssue::with(['username'])?->get()->toArray(),
        ];
        
        

        return view('pages.adminPage')->with('admin', $data);
    }

    
}
