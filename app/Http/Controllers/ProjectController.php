<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects; 
use App\Models\ProjectTiers;

class ProjectController extends Controller
{
    public function index(int $idArg)
    {
        // $projectDataVar = Projects::where('id', '=', $idArg)->first();

        // $dataVar = [
        //     'projectId' => $projectDataVar->id,
        //     'projectUserId' => $projectDataVar->user_id,
        //     'projectTitle' => $projectDataVar->title,
        //     'projectDescription' => $projectDataVar->description,
        //     'projectTags' => $projectDataVar->tags,
        //     'projectTargetAmount' => $projectDataVar->target_amt,
        //     'projectImg' => $projectDataVar->img,
        //     'projectYtLing' => $projectDataVar->yt_link,
        //     'projectTargetDate' => $projectDataVar->target_date,
        //     'projectTiers' => $this->_getProjectTiers($idArg),
        //     'projectCreatedAt' => $projectDataVar->created_at->format('M d Y'),
        //     'projectUpdatedAt' => $projectDataVar->updated_at->format('M d Y'),
        // ];

        $projectDataVar = Projects::find($idArg)->toArray();
        $projectDataVar = array_merge($projectDataVar, ['tiers' => $this->_getProjectTiers($idArg)]);

        // return view('pages.projectViewPage', $dataVar);
        return view('pages.projectViewPage')->with('project', $projectDataVar);

    }


    private function _getProjectTiers(int $projectIdArg)
    {
        $tiersVar = ProjectTiers::where('proj_id', '=', $projectIdArg)->get()->toArray();

        if(count($tiersVar) > 0)
        {
            return($tiersVar);
        }
        else
        {
            return(null);
        }
        
    }


    /***
     * Public function to get the input from the user
     */
    public function saveCreatedProject(Request $requestArg)
    {
        $dataVar = new Projects;
        $dataVar->user_id = $requestArg->session()->get('loginId');
        $dataVar->title = $requestArg->ProjTitle;
        $dataVar->description = $requestArg->ProjDesc;
        $dataVar->tags = implode(',', $requestArg->Tags);
        $dataVar->target_amt = $requestArg->ProjTarget;
        $dataVar->yt_link= $requestArg->ProjVideo;
        $dataVar->logo = null;
        $dataVar->banner = null;
        $dataVar->target_date = $requestArg->ProjDate;
        $dataVar->save();

        // The Images are later uploaded because we need the project ID to be generated first
        $this->_saveImage($requestArg, $dataVar->id, 'logo', 'ProjLogo');
        $this->_saveImage($requestArg, $dataVar->id, 'banner', 'ProjBanner');

        // Saving Tiers
        $this->_saveTiers($dataVar->id, $requestArg);
        
        // Note to future RamonDev Redirect to Project view page.
        return redirect('project-view/'.$dataVar->id);

    }


    private function _saveImage(Request $requestArg, string $projectIdArg, string $typeArg, string $formNameArg)
    {
        $pathVar = $requestArg->file($formNameArg)->storeAs(
            'project_'.$typeArg.'s', //Folder name
            //Naming Scheme: {{projectID}}._project_{{$typeArg}}_.{{originalFilename}}
            'project_'.$projectIdArg.'_'.$typeArg.'.'.$requestArg->file($formNameArg)->getClientOriginalExtension(),
            'public', //Disc (optional. It is like the root folder)
        );
        
        Projects::where('id', $projectIdArg)->update([$typeArg => $pathVar]);
    }


    private function _saveTiers($projectIdVar, $requestArg)
    {
        $currentTierVar = 1;
        for ($index = 0; $index < count($requestArg->Tier); $index++)
        {
            $tierVar = new ProjectTiers;
            $tierVar->proj_id = $projectIdVar;

            $tierVar->level = $currentTierVar;

            $tierVar->name = $requestArg->Tier[$index]['name'];
            $tierVar->amount = $requestArg->Tier[$index]['amount'];
            $tierVar->benefit = $requestArg->Tier[$index]['benefits'];

            $tierVar->save();
            $currentTierVar += 1;
        }
    }

}
