<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userId = $request->session()->get('loginId');
        $query = User::find($userId);
        $dev_mode = false;

        if ($query)
            $dev_mode = $query->dev_mode;
        
        return view('pages.home')->with('mode', $dev_mode);
    }
}
