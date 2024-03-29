<?php

namespace App\Http\Controllers;

// Import Controllers
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\UpdatesController;
use App\Http\Controllers\ProjectCommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProjectStatController;
use App\Http\Controllers\PaymentsController;

// Import models
use App\Models\Projects; 
use App\Models\ProjectTiers;
use App\Models\UserPreference;
use App\Models\ProjectStats;
use App\Models\User;

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
        return view('pages.project')->with('project', $projectDataVar);
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

        if(Auth::check()){
            $projectDataVar = array_merge($projectDataVar, ['recommend' => (new ProjectService)->recommendation($projectDataVar, $idArg)]);
        }
        else{
            $projectDataVar = array_merge($projectDataVar, ['popular' => (new ProjectService)->popularProjects($projectDataVar, $idArg)]);
        }
        $projectDataVar = array_merge($projectDataVar, ['tiers' => $this->_getProjectTiers($idArg)]);

        $projectDataVar = array_merge($projectDataVar, ['user' =>
            [
                'isFollowed' => (new UserPreferenceController)->checkIfFollowed($idArg),
                'isSupported' => (new UserPreferenceController)->checkIfSupported($idArg),
            ]
        ]);

        if(Auth::check()){
            $projectDataVar['user']['donationTotal'] = (float)(new PaymentsController)->getUserProjectPayments($idArg);
            
            $projectDataVar['user']['tier_level'] = 0;
            $projectDataVar['user']['tier_name'] = '';
            foreach($projectDataVar['tiers'] as $tier){
                if($projectDataVar['user']['donationTotal'] >= (float)$tier['amount']){
                    $projectDataVar['user']['tier_level'] = $tier['level'];
                    $projectDataVar['user']['tier_name'] = $tier['name'];
                }
            }
        }

        $projectDataVar = array_merge($projectDataVar, ['updates' => (new UpdateController)->index($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['comments' => (new ProjectCommentController)->getComments($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['stats' => (new ProjectStatController)->getProjectStats($idArg)]);

        $projectDataVar['stats']['target_percentage'] = $projectDataVar['stats']['donation_count']/$projectDataVar['target_amt']*100;
        $projectDataVar['stats']['milestone_percentage'] = $projectDataVar['stats']['donation_count']/$projectDataVar['target_milestone']*100;
        
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
            $newStats->proj_id = $dataVar->id;
            $newStats->save();
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


    public function getProjects(Request $requestArg): void
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


    public function updateStatus(Request $requestArg, string $methodArg)
    {
        if(count(User::where([['id', '=', Auth::id()],['admin', '=', true]])->get()) == 0){
            $json_data = array("response" => "fail");
        }
        else{

            // Improve this
            if($methodArg == "approve" || $methodArg == "inprogress")
                $statusVar = "In Progress";
            elseif($methodArg == "denied")
                $statusVar = "Denied";
            elseif($methodArg == "halt")
                $statusVar = "Halt";
            elseif($methodArg == "completed")
                $statusVar = "Completed";
            
            $projectVar = Projects::where('id', '=', $requestArg->ProjectId)->update(['status' => $statusVar]);
            $json_data = array("response" => "success");
        }
        echo json_encode($json_data);
        
        
    }

}
