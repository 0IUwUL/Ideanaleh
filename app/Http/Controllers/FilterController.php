<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects; 
use App\Http\Controllers\UserPreferenceController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;

class FilterController extends Controller
{
    public function index(): Object
    {
        $projectDataVar = array('projects'=>Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                    ->orderBy('created_at', 'desc')
                                                    ->get()
                                                    ->toArray()
        );
        $projectDataVar['projects'] = $this->sort('followed', $projectDataVar['projects'], null);
        $projectDataVar = array_merge($projectDataVar, ['categories' => config('category')[0]]);
        $options = array(
            'followed' => 'Most Followed', 
            'supported' => 'Most Supported',
            'Newest' => 'Newest',
        );
        $projectDataVar['search'] = false;
        $projectDataVar = array_merge($projectDataVar, ['options' => $options]);
        return view('pages.display_projects')->with(['ProjArg'=> $projectDataVar]);
    }

    public function Filter(Request $request): void
    {
        $selected = $request->option;
        $category = $request->category;
        $page = $request->page;
        $filter = false;
        if($category && Session::get('search')){
            $conditions = [
                'category'=> $category,
                ['title', 'LIKE', '%'.Session::get('search').'%'],
            ];
            $filter = true;
        }elseif($category){
            $conditions = ['category' => $category,];
        }elseif(Session::get('search')){
            $conditions = ['title'=> Session::get('search'),];
            $filter = true;
        }else{
            $conditions = null;
        }
        // get projects
        if($conditions){
            $hold = Projects::where($conditions)
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
            $projectDataVar = $this->sort($selected, $hold, $page);
        }else{
            $projectDataVar = $this->paginate($hold, 6, $page);
        }
        $viewRender = view('formats.filter')->with(['ProjArg' => $projectDataVar, 'search' => $filter])->render();
        $link = $projectDataVar->links()->render();
        $json_data = array('item' => $viewRender, 'link' => $link);
        echo json_encode($json_data);
    }

    public function Search(Request $request): Object
    {
        // dd($request->search);
        if($request->search){
            $projectDataVar = array(
                'projects'=>Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->where('title', 'LIKE', '%'.$request->search.'%')
                                    ->orderBy('created_at', 'desc')
                                    ->get()
                                    ->toArray()
            );
        }else{
            $projectDataVar = array('projects'=>Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                        ->orderBy('created_at', 'desc')
                                                        ->get()
                                                        ->toArray()
            );
        }
        $request->session()->put('search', $request->search);
        $projectDataVar['projects'] = $this->sort('followed', $projectDataVar['projects'], null);
        $projectDataVar['search'] = true;
        $projectDataVar = array_merge($projectDataVar, ['categories' => config('category')[0]]);
        $options = array(
            'followed' => 'Most Followed', 
            'supported' => 'Most Supported',
            'Newest' => 'Newest',
        );
        $projectDataVar = array_merge($projectDataVar, ['options' => $options]);
        return view('pages.display_projects')->with(['ProjArg'=> $projectDataVar]);
    }

    private function _getPreferences(string $selected): array
    {
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

    private function sort(string $selected, array $projects, $page){
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
        $projectDataVar = $this->paginate($projectDataVar, 6, $page);
        $projectDataVar->withPath('/main');
        return $projectDataVar;
    }
    // paginate
    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

}
