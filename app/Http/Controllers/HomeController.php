<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;
use App\Services\ProjectService;
use App\Models\Payments;

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
    public function index(Request $request, ProjectService $projectService): Object
    {
        $request->session()->put('search', null);
        $dev_mode = $this->_SystemSummary();
        // dd($this->_SystemSummary());
        if (Auth::check())
            $dev_mode = array_merge($dev_mode, ['recommend' => $projectService->recommendation(null,0)]);
        else
            $dev_mode = array_merge($dev_mode, ['popular'=>$projectService->popularProjects()[0]]);
        return view('pages.home')->with('mode', $dev_mode);
    }

    private function _SystemSummary(): array
    {
        // total donation
        $items['total_donation'] = Payments::sum('amount');
        return $items;
    }
}
