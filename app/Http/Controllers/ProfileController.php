<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Models\UserPreference; 
use App\Models\Projects;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(int $id): object
    {
        // getting and project detail 
        $dataVar = $this->_getDetails($id);
        
        // making preferences id to array
        foreach($dataVar['pref'] as $class => $items){
            if(!(is_null($items)) && $items != "" && $class != 'id' && $class != 'user_id'){
                $ids = explode(',', $items);
                $dataVar['pref'][$class] = $ids;
            }
        }

        foreach($dataVar['pref'] as $class => $list){
            if($class != 'id' && $class != 'user_id' && $list != NULL){
                foreach($list as $key => $proj){
                    $projVar = $this->_getProjTitle((int)$proj);
                    $dataVar['pref'][$class][$key] = $projVar;
                }
            }
        }

        if($dataVar['dev_mode']){
            $dataVar['dev_mode'] = 'Developer';
            $dataVar['status'] = 'dev';
        }else{
            $dataVar['dev_mode'] = 'User';
            $dataVar['status'] = 'user';
        }
            // dd($dataVar);
        return view('pages.profile')->with('details', $dataVar);
    }

    private function _getProjTitle(int $id): array
    {
        $proj = Projects::where('id', '=', $id)
                        ->select('id','title', 'user_id', 'logo', 'category', 'description')
                        ->first()
                        ->toArray();
        return $proj;
    }

    private function _getDetails(int $id): array
    {
        $proj = User::where('id', '=', $id)
                        ->select('id','Lname', 'Fname', 'Mname', 'email', 'icon', 'dev_mode')
                        ->with(['project'])
                        ->with(['pref'])
                        ->first()
                        ->toArray();
        return $proj;
    }
}
