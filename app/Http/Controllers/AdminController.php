<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Projects;
use App\Models\Payments;
use App\Models\ProjectStats;
use App\Models\UserIssue;

class AdminController extends Controller
{
    public function index(): Object
    {
        $data = [
            'users' => User::all()?->toArray(),
            'projects' => Projects::all()?->toArray(),
            'user_issues' => UserIssue::with(['username'])?->get()->toArray(),
        ];
        
        $data['dashboard'] = $this->_getResults($data['projects']);
        // dd($data);
        return view('pages.admin')->with('admin', $data);
    }

    private function _getResults(array $projects): array
    {
        $data['users'] = User::count();
        $data['project'] = Projects::count();
        $data['issues'] = UserIssue::count(); // + ProjectIssue::count()
        $data['developers'] = $this->_SortDevelopers();
        // $data['top_dev'] = Projects::
        // $data['shish'] = Projects::withCount('tags')->get();
        $data['donators'] = $this->_Sortdonators();
        // $data['Donatedate'] = $this->_SortPerDate();
        return $data;
    }

    private function _Sortdonators(): Array
    {
        // get all donation with user data
        $data = Payments::select('id', 'user_id', 'amount', 'updated_at')
                        ->with(['user'])
                        ->get();
        // get total sum user's donated
        foreach($data as $key => $value){
            $donator[$value['user_id']] = Payments::where('user_id', '=', $value['user_id'])
                                                    ->sum('amount');
        }
        // remove repetion
        $data = $data->unique(function ($item) {
            return $item['user_id'];
        });

        foreach($data as $key => $value){
            foreach($donator as $user_id => $amount){
                if($value['user_id'] == $user_id)
                    $data[$key]['amount'] = $amount;
            }
        }
        $data = $data->take(5)
                    ->sortByDesc('amount');
        $data = $data->toArray();

        return $data;
    }

    private function _SortDevelopers(): Array
    {
        // get all donation with user data
        $data = Projects::select('id','user_id', 'title')
                        ->with(['proj_stat'])
                        ->get();
        // get total sum project donation, support, and follow count
        foreach($data as $key => $value){
            $data[$key]['average'] = ($value['proj_stat']['support_count'] + $value['proj_stat']['follow_count'])/2;
        }
        
        foreach($data as $key => $value){
            $data[$key]['donation'] = $value['proj_stat']['donation_count'];
        }
        $proj['developer'] = $data->sortByDesc('average')
                                ->take(5)
                                ->toArray();
        $proj['projects'] = $data->sortByDesc('donation')
                                ->take(5)
                                ->toArray();
        return $proj;
    }
}
