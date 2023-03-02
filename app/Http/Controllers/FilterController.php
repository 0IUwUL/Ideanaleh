<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects; 
use App\Models\ProjectStats; 
use App\Http\Controllers\UserPreferenceController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Session;

class FilterController extends Controller
{
    public function index(): object
    {
        $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                    ->orderBy('created_at', 'desc')
                                                    ->get()
                                                    ->toArray();
        $project = $this->_returnFormat($projectDataVar);
        return view('pages.display_projects')->with(['ProjArg'=> $project]);
    }

    public function Search(Request $request): object
    {
        if($request->search){
            $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                    ->where('title', 'LIKE', '%'.$request->search.'%')
                                    ->orWhere('tags', 'LIKE', '%'.$request->search.'%')
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        }else{
            $projectDataVar = Projects::select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                                        ->orderBy('created_at', 'desc')
                                                        ->get();
        }
        $request->session()->put('search', $request->search);
        $project = $this->_returnFormat($projectDataVar->toArray());
        $project['search'] = true;
        return view('pages.display_projects')->with(['ProjArg'=> $project]);
    }

    public function SearchSuggestion(Request $request): void
    {
        $items = null;
        if($request->input){
            $items = Projects::select('id','title')
                            ->where('title', 'LIKE', '%'.$request->input.'%')
                            ->orWhere('tags', 'LIKE', '%'.$request->input.'%')
                            ->orderBy('created_at', 'desc')
                            ->get();
        }
        $viewRender = view('formats.suggestions')->with(['items' => $items, 'input' => $request->input])->render();
        $json_data['item'] = $viewRender;
        echo json_encode($json_data);
    }

    private function _returnFormat(array $projectDataVar): array
    {
        $projects['projects'] = $this->sort('follow', $projectDataVar, null);
        $projects = array_merge($projects, ['categories' => config('category')[0]]);
        $options = array(
            'follow' => 'Most Followed', 
            'support' => 'Most Supported',
            'Newest' => 'Newest',
        );
        $projects['search'] = false;
        $projects = array_merge($projects, ['options' => $options]);
        return $projects;
    }

    private function sort(string $selected, array $projects, $page){
        $projectDataVar = []; 
        $order = $this->_getPreferences($selected);
        foreach($projects as $id => $project){
            foreach($order as $key => $value){
                if($value['proj_id'] == $project['id'])
                    $project[$selected] = $value[$selected.'_count'];
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


    public function Filter(Request $request): void
    {
        $selected = $request->option;
        $category = $request->category;
        $page = $request->page;
        $conditions = false;
        $filter =false;
        if($category && Session::get('search')){
            $conditions = true;
            $filter = true;
        }
        if(Session::get('search'))
            $filter = true;
        // get projects
        if($conditions || $category){
            if($category && $filter){
                $hold = Projects::where('category', '=', $category)
                                ->where(function($query) {
                                    $query->orWhere('tags', 'LIKE', '%'.Session::get('search').'%')
                                            ->orWhere('title', 'LIKE', '%'.Session::get('search').'%');
                                })
                                ->select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->toArray();
            }elseif($category){
                $hold = Projects::where('category', '=', $category)
                                ->select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->toArray();
            }elseif($filter){
                $hold = Projects::where('title', 'LIKE', '%'.Session::get('search').'%')
                                ->orWhere('tags', 'LIKE', '%'.Session::get('search').'%')
                                ->select('id','title', 'description', 'category', 'tags', 'logo', 'banner')
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->toArray();
            }
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

    private function _getPreferences(string $selected): array
    {
        $final = ProjectStats::select('proj_id',  $selected.'_count')
                        ->orderBy($selected.'_count', 'desc')
                        ->get()
                        ->toArray();
        return $final;
    }
}
