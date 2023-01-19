<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Models\UserPreference; 
use App\Models\Projects;
use App\Models\User;

class ProfilePageController extends Controller
{
    public function index(int $id): object
    {
        $ProjIds = []; 
        $dataVar = $this->_getUserPreferences($id)->toArray();

        foreach($dataVar as $class => $items){
            if(!(is_null($items)) || $items != ""){
                $ids = explode(',', $items);
                $ProjIds[$class] = $ids;
            }
        }
        foreach($ProjIds as $class => $list){
            foreach($list as $key => $proj){
                $projVar = $this->_getProjTitle((int)$proj);
                $ProjIds[$class][$key] = $projVar;
            }
        }
        $ProjIds['own'] = $this->_getDevProjTitle($id);
        // dd($ProjIds);
        if($ProjIds['own']['dev_mode']){
            $ProjIds['own']['dev_mode'] = 'Developer';
            $ProjIds['own']['status'] = 'dev';
        }else{
            $ProjIds['own']['dev_mode'] = 'User';
            $ProjIds['own']['status'] = 'user';
        }

        return view('pages.profile_page')->with('details', $ProjIds);
    }

    private function _getUserPreferences(int $id): Object
    {
        $pref = UserPreference::where('user_id', '=', $id)
                                ->select('followed', 'supported')
                                ->first();
        return $pref;
    }

    private function _getProjTitle(int $id): array
    {
        $proj = Projects::where('id', '=', $id)
                        ->select('id', 'title')
                        ->first()
                        ->toArray();
        return $proj;
    }

    private function _getDevProjTitle(int $id): array
    {
        $proj = User::where('id', '=', $id)
                        ->select('id','Lname', 'Fname', 'Mname', 'email', 'icon', 'dev_mode')
                        ->with(['project'])
                        ->first()
                        ->toArray();
        return $proj;
    }
}
