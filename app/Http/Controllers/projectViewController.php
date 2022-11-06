<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class projectViewController extends Controller
{
    public function index()
    {
        return view('pages.projectViewPage');
    }
}
