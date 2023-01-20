<?php

namespace App\Http\Controllers;

// Import Controllers
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\UpdatesController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProjectStatController;

// Import models
use App\Models\Projects; 
use App\Models\ProjectTiers;
use App\Models\UserPreference;
use App\Models\ProjectStats;

use Illuminate\Http\Request;
use Auth;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function index(): Object
    {
        $userProjectVar = Projects::where('user_id', Auth::id())->first();
        if($userProjectVar != null){
            return redirect('project/view/'.$userProjectVar->id);
        }
        else{
            // $categoryVar = $this->_getEnumValues('category');
            $categoryVar = [
                //Added '[0]' after the config() because it returns an array named '0'
                'categories' => config('category')[0],
            ];

            return view('pages.create')->with('data', $categoryVar);
        }
    }


    public function view(int $idArg): Object
    {
        $projectDataVar = $this->_getProjectData($idArg);
        // dd($projectDataVar);
        return view('pages.projectViewPage')->with('project', $projectDataVar);
    }


    public function edit(int $idArg): Object
    {
        $projectDataVar = [
            'project' => $this->_getProjectData($idArg),
            'categories' => config('category')[0]
        ];

        if($projectDataVar['project']['user_id'] == Auth::id()){
            return view('pages.edit-project')->with('data', $projectDataVar);
        }
        else{
            return redirect('/');
        }
    }


    private function _getProjectData(int $idArg): array
    {
        $projectDataVar = Projects::where('id', $idArg)->with(['dev'])->first()->toArray();

        if(!$projectDataVar) return(abort(404));
        // $projCategory = Projects::where('category', '=', $projectDataVar["category"])->get()->toArray();
        if(Auth::check()){
            $projectDataVar = array_merge($projectDataVar, ['recommend' => (new ProjectService)->recommendation($projectDataVar, $idArg)]);
        }
        else{
            $projectDataVar = array_merge($projectDataVar, ['popular' => (new ProjectService)->popularProjects($projectDataVar, $idArg)]);
        }
        $projectDataVar = array_merge($projectDataVar, ['tiers' => $this->_getProjectTiers($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['isFollowed' => (new UserPreferenceController)->checkIfFollowed($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['isSupported' => (new UserPreferenceController)->checkIfSupported($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['updates' => (new UpdateController)->index($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['comments' => (new ProjectCommentController)->getComments($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['stats' => (new ProjectStatController)->getProjectStats($idArg)]);
        // dd($projectDataVar);
        return $projectDataVar;
    }
    


    private function _getProjectTiers(int $projectIdArg): array|null
    {
        $tiersVar = ProjectTiers::where('proj_id', '=', $projectIdArg)->get()->toArray();

        if(count($tiersVar) == 0) return(null);

        return($tiersVar);
    }


    /***
     * Public function to get the input from the user
     */
    public function saveCreatedProject(Request $requestArg): Object
    {
        $dataVar = $this->_saveNewProject($requestArg);
        
        // The Images are later uploaded because we need the project ID to be generated first
        if($requestArg->hasFile('ProjLogo'))
            $this->_saveImage($requestArg, $dataVar->id, 'logo', 'ProjLogo');
        if($requestArg->hasFile('ProjBanner'))
            $this->_saveImage($requestArg, $dataVar->id, 'banner', 'ProjBanner');

        // Saving Tiers
        $this->_saveTiers($dataVar->id, $requestArg);
        
        // Note to future RamonDev Redirect to Project view page.
        return redirect('project/view/'.$dataVar->id);

    }

    private function _saveNewProject(Request $requestArg): Object
    {
        
        if($requestArg->ProjId != null){
            $dataVar = Projects::find($requestArg->ProjId);
        }
        else{
            $dataVar = new Projects;
            $dataVar->logo = null;
            $dataVar->banner = null;
        }
        $dataVar->user_id = Auth::id();
        $dataVar->title = $requestArg->ProjTitle;
        $dataVar->description = $requestArg->ProjDesc;
        $dataVar->story = $requestArg->ProjStory;
        $dataVar->category = $requestArg->ProjCategory;
        $dataVar->tags = implode(',', $requestArg->Tags);
        $dataVar->target_amt = $requestArg->ProjTarget;
        $dataVar->target_milestone = $requestArg->ProjMilestone;
        if($requestArg->ProjVideo) $dataVar->yt_link = $this->_getYoutubeId($requestArg->ProjVideo);
        else $dataVar->yt_link = null;
        $dataVar->logo = null;
        $dataVar->banner = null;
        $dataVar->target_date = $requestArg->ProjDate;
        $dataVar->save();

        // creating new project stats row
        if($requestArg->ProjId == null){
            $newStats = new ProjectStats;
            $newStats->proj_id = $dataVar->id();
        }

        return $dataVar;
    }

    private function _saveImage(
        Request $requestArg, 
        string $projectIdArg, 
        string $typeArg, 
        string $formNameArg): void
    {
        $pathVar = $requestArg->file($formNameArg)->storeAs(
            'project_'.$typeArg.'s', //Folder name
            //Naming Scheme: {{projectID}}._project_{{$typeArg}}_.{{originalFilename}}
            'project_'.$projectIdArg.'_'.$typeArg.'.'.$requestArg->file($formNameArg)->extension(),
            'public', //Disc (optional. It is like the root folder)
        );
        
        Projects::where('id', $projectIdArg)->update([$typeArg => $pathVar]);
    }


    private function _saveTiers(int $projectIdVar, Request $requestArg): void
    {
        $currentTierVar = 1;
        for ($index = 0; $index < count($requestArg->Tier); $index++)
        {
            if(isset($requestArg->Tier[$index]['id'])){
                $tierVar = ProjectTiers::find($requestArg->Tier[$index]['id']);
            }
            else{
                $tierVar = new ProjectTiers;
            }
            $tierVar->proj_id = $projectIdVar;

            $tierVar->level = $currentTierVar;

            $tierVar->name = $requestArg->Tier[$index]['name'];
            $tierVar->amount = $requestArg->Tier[$index]['amount'];
            $tierVar->benefit = $requestArg->Tier[$index]['benefits'];

            $tierVar->save();
            $currentTierVar += 1;
        }
    }

    private function _getYoutubeId(string $urlParams): string
    {
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $urlParams, $match);
        
        return $match[1];
    }

    public function _getProjects(Request $requestArg): void
    {
        $pref_categs = $requestArg->categs;
        foreach ($pref_categs as $key => $categories){
            $sample = Projects::where('category', '=', $categories)
                                ->select(array('id', 'title', 'description'))
                                ->get()
                                ->toArray();
            $project[$categories] = $sample;
        }
        $viewRender = view('formats.projects')->with(['items'=> $project])->render();
        $json_data = array('item' => $viewRender);
        // $json_data = array("response" => $project);
        echo json_encode($json_data);
    }

}
