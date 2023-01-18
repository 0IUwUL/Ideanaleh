<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;
use App\Http\Controllers\ProjectController;
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
    public function index(Request $request): Object
    {
        $dev_mode = array(
            'dev'=>false);
        if (Auth::check()){
            $dev_mode = array('dev' => Auth::user()->dev_mode);
            $dev_mode = array_merge($dev_mode, ['recommend' => (new ProjectController)->recommendation(null,0)]);
        }
        else{
            
            $dev_mode = array_merge($dev_mode, ['popular'=>(new ProjectController)->popularProjects()[0]]);
        }
        

        return view('pages.home')->with('mode', $dev_mode);
    }
}
