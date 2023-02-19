<?php

namespace App\Services;

use Carbon\Carbon;

// Import Models
use App\Models\User;
use App\Models\Projects;
use App\Models\Payments;
use App\Models\UserIssue;
use App\Models\ProjectIssue;
use App\Models\UserRequest;

class AdminService {

    public function getResults(array $projects): array
    {
        $data['users'] = User::count();
        $data['project'] = Projects::count();
        $data['issues'] = UserIssue::count() + ProjectIssue::count();
        $data['developers'] = $this->_SortDevelopers();
        $data['charts'] = $this->_getCharts();
        $data['donators'] = $this->_Sortdonators();
        return $data;
    }

    private function _Sortdonators(): Array
    {
        // get all donation with user data
        $data = Payments::select('id', 'user_id', 'amount')
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
                    ->sortByDesc('amount')
                    ->values()
                    ->toArray();

        return $data;
    }

    private function _SortDevelopers(): Array
    {
        // get all donation with user data
        $data = Projects::select('id','user_id', 'title')
                        ->with(['proj_stat'])
                        ->get();
        foreach($data as $key => $dev){
            $data[$key]['name'] = User::where('id', '=', $dev['user_id'])
                                        ->select('id', 'Lname')
                                        ->first()
                                        ->toArray();
        }
        // get total sum project donation, support, and follow count
        foreach($data as $key => $value){
            $data[$key]['average'] = ($value['proj_stat']['support_count'] + $value['proj_stat']['follow_count'])/2;
        }

        foreach($data as $key => $value){
            $data[$key]['donation'] = $value['proj_stat']['donation_count'];
        }
        $proj['developer'] = $data->sortByDesc('average')
                                ->take(5)
                                ->values()
                                ->toArray();
        $proj['projects'] = $data->sortByDesc('donation')
                                ->take(5)
                                ->values()
                                ->toArray();
        return $proj;
    }

    private function _getCharts(): array
    {
        $user = User::select('created_at')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->toArray();
        $data['user'] = $this->_simplifyDate($user);
        $project = Projects::select('created_at')
                        ->orderBy('created_at', 'desc')
                        ->get()
                        ->toArray();
        $data['project'] = $this->_simplifyDate($project);

        $payment = Payments::select('created_at')
                            ->orderBy('created_at', 'desc')
                            ->get()
                            ->toArray();
        $data['donation'] = $this->_simplifyDate($payment);
        return $data;
    }

    private function _simplifyDate(array $data): array
    {
        foreach($data as $key => $date)
            $data[$key]['created_at'] = Carbon::parse($date['created_at'])->format('d F Y');
        $data = collect($data);
        $unique = $data->unique();
        $unique = $unique->toArray();
        $temp = 0;
        foreach($unique as $key => $date){
            foreach($data as $p_date){
                if(strcmp($p_date['created_at'], $date['created_at']) == 0){
                    $temp += 1;
                }
            }
            $unique[$key]['total'] = $temp;
            $temp = 0;
        }
        $unique = array_slice($unique, 0, 10);
        $unique = array_reverse($unique);
        return $unique;
    }

    public function getTopProjects(int $projectAmountArg, string $columnArg): array
    {
        $dataVar = Projects::join('project_stats', 'projects.id', '=', 'project_stats.proj_id')
        ->select('projects.*', 'project_stats.follow_count')
        ->orderBy($columnArg, 'desc')
        ->get()->take($projectAmountArg)
        ->toArray();

        return($dataVar);
    }

    public function getTopSupportedCategory(): array
    {
        foreach(config('category')[0] as $category){
            $categoryVar[$category] = 0.0;
        }

        $dataVar = Projects::join('project_stats', 'projects.id', '=', 'project_stats.proj_id')
                            ->select('projects.category', 'project_stats.donation_count')
                            ->where('project_stats.donation_count', '>', 0)
                            ->get()->toArray();

        foreach($dataVar as $value){
            $categoryVar[$value['category']] += $value['donation_count'];
        }
        
        arsort($categoryVar);

        foreach($categoryVar as $key => $value ){
            $newArrayVar[] = array(
                'name' => $key,
                'total' =>$value,
            );
        }

        return($newArrayVar);

    }

    public function getUserTable(string $find): array
    {
        $users = User::select('id','Lname','email','admin','dev_mode','active', 'created_at')
                    ->where('Lname', 'LIKE', '%'.$find.'%')
                    ->orWhere('email', 'LIKE', '%'.$find.'%')
                    ->get()
                    ->toArray();
        return $users;
    }

    public function getUserIssueTable(string $find): array
    {
        $UIssue = UserIssue::select('id','user_id','content','created_at')
                    // ->where('subject', 'LIKE', '%'.$find.'%')
                    ->where('content', 'LIKE', '%'.$find.'%')
                    ->with(['username'])
                    ->get()
                    ->toArray();
        return $UIssue;
    }

    public function getProjectTable(string $find): array
    {
        $projects = Projects::select('id','user_id','title','created_at','target_date')
                    ->where('title', 'LIKE', '%'.$find.'%')
                    ->with(['username'])
                    ->get()
                    ->toArray();
        return $projects;
    }

    public function getProjIssueTable(string $find): array
    {
        $ProjIssues = ProjectIssue::select('id','project_id','user_id','content')
                    ->where('content', 'LIKE', '%'.$find.'%')
                    ->with(['project','username'])
                    ->get()
                    ->toArray();
        return $ProjIssues;
    }

    public function getDefaultTable(string $table): array
    {
        if($table == 'user'){
            $arr = User::select('id','Lname','email','admin','dev_mode','active', 'created_at')
                            ->get()
                            ->toArray();
        }elseif($table == 'proj'){
            $arr = Projects::select('id','user_id','title','created_at','target_date')
                    ->with(['username'])
                    ->get()
                    ->toArray();
        }elseif($table == 'user_issue'){
            $arr = UserIssue::select('id','user_id','content','created_at')
                    ->with(['username'])
                    ->get()
                    ->toArray();
        }else{
            $arr = ProjectIssue::select('id','project_id','user_id','content')
                    ->with(['project','username'])
                    ->get()
                    ->toArray();
        }

        return $arr;
    }

}