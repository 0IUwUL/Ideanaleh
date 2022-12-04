<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects; 
use App\Http\Controllers\UserPreferenceController;

class FilterProjects extends Controller
{
    public function index()
    {
        $projectDataVar = array('projects'=>Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                    ->get()
                                                    ->toArray()
        );
        $projectDataVar = array_merge($projectDataVar, ['categories' => config('category')[0]]);
        $options = array(
            'followed' => 'Most Followed', 
            'supported' => 'Most Supported',
            'Newest' => 'Newest',
        );
        $projectDataVar = array_merge($projectDataVar, ['options' => $options]);
        $final = $this->_getPreferences('followed');
        return view('pages.display_projects')->with(['ProjArg'=> $projectDataVar, 'item' => $final]);
    }

    public function Filter(string $selected){
        if($selected == 'Newest'){
            $final = null;
            $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->orderBy('created_at', 'desc')
                                    ->get()
                                    ->toArray();     
        }else{
            $final = $this->_getPreferences($selected);
            $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->get()
                                    ->toArray();           
        }
        $viewRender = view('formats.filter')->with(['items'=> $final, 'ProjArg' => $projectDataVar])->render();
        $json_data = array('item' => $viewRender);
        echo json_encode($json_data);
    }

    public function Category(string $selected){
        $final = null;
        $projectDataVar = Projects::where('category', '=', $selected)
                                ->select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                ->get()
                                ->toArray();           
        $viewRender = view('formats.filter')->with(['items'=> $final, 'ProjArg' => $projectDataVar])->render();
        $json_data = array('item' => $viewRender);
        echo json_encode($json_data);
    }

    private function _getPreferences(string $selected){
        $arr = (new UserPreferenceController)->_getAllPreferences($selected);
        $pref = [];
        foreach($arr as $item){
            foreach ($item as $values){
                $pref = array_merge($pref, explode(',', $values));
            }
        }
        $final = array_count_values($pref);
        arsort($final);
        return $final;
    }

}
