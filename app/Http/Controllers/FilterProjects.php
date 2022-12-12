<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects; 
use App\Http\Controllers\UserPreferenceController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterProjects extends Controller
{
    public function index()
    {
        $projectDataVar = array('projects'=>Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                    ->orderBy('created_at', 'desc')
                                                    ->get()
                                                    ->toArray()
        );
        $projectDataVar['projects'] = $this->sort('followed', $projectDataVar['projects']);
        $projectDataVar = array_merge($projectDataVar, ['categories' => config('category')[0]]);
        $options = array(
            'followed' => 'Most Followed', 
            'supported' => 'Most Supported',
            'Newest' => 'Newest',
        );
        $projectDataVar = array_merge($projectDataVar, ['options' => $options]);
        return view('pages.display_projects')->with(['ProjArg'=> $projectDataVar]);
    }

    public function Filter(Request $request){
        $selected = $request->option;
        $category = $request->category;
        // get projects
        if($category){
            $hold = Projects::where('category', '=', $category)
                                        ->select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                        ->orderBy('created_at', 'desc')
                                        ->get()
                                        ->toArray();
        }else{
            $hold = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->orderBy('created_at', 'desc')
                                    ->get()
                                    ->toArray(); 
        }
        if($selected != 'Newest'){
            $projectDataVar = $this->sort($selected, $hold);
        }else{
            $projectDataVar = $hold;
        }

        $viewRender = view('formats.filter')->with(['ProjArg' => $projectDataVar])->render();
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

    private function sort(string $selected, array $projects){
        $projectDataVar = []; $hold1 = [];
        
        // pre assign values
        foreach($projects as $item){
            $item[$selected] = 0;
            array_push($hold1, $item);
        }
        $order = $this->_getPreferences($selected);
        foreach($hold1 as $id => $project){
            foreach($order as $key => $value){
                if($key == $project['id'])
                    $project[$selected] = $value;
            }
            array_push($projectDataVar, $project);
        }
        // sort array by count of selected
        array_multisort (array_column($projectDataVar, $selected), SORT_DESC, $projectDataVar);
        return $projectDataVar;
    }

}
