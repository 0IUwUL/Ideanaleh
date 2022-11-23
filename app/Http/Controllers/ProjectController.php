<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserPreferenceController;

use Illuminate\Http\Request;
use App\Models\Projects; 
use App\Models\ProjectTiers;
use Auth;

class ProjectController extends Controller
{
    public function index()
    {
        // $categoryVar = $this->_getEnumValues('category');
        $categoryVar = [
            //Added '[0]' after the config() because it returns an array named '0'
            'categories' => config('category')[0],
        ];

        return view('pages.create')->with('data', $categoryVar);
    }


    public function view(int $idArg){
        $projectDataVar = Projects::find($idArg)->toArray();
        $projectDataVar = array_merge($projectDataVar, ['tiers' => $this->_getProjectTiers($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['isFollowed' => (new UserPreferenceController)->checkIfFollowed($idArg)]);

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
        $dataVar->user_id = Auth::id();
        $dataVar->title = $requestArg->ProjTitle;
        $dataVar->description = $requestArg->ProjDesc;
        $dataVar->category = $requestArg->ProjCategory;
        $dataVar->tags = implode(',', $requestArg->Tags);
        $dataVar->target_amt = $requestArg->ProjTarget;
        $dataVar->yt_link= $this->_getYoutubeId($requestArg->ProjVideo);
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
        return redirect('project/view/'.$dataVar->id);

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

    private function _getYoutubeId($urlParams)
    {
        // from https://stackoverflow.com/questions/3392993/php-regex-to-get-youtube-video-id
        // Supported YT Links
        // http://youtu.be/dQw4w9WgXcQ
        // http://www.youtube.com/embed/dQw4w9WgXcQ
        // http://www.youtube.com/watch?v=dQw4w9WgXcQ
        // http://www.youtube.com/?v=dQw4w9WgXcQ
        // http://www.youtube.com/v/dQw4w9WgXcQ
        // http://www.youtube.com/e/dQw4w9WgXcQ
        // http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
        // http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
        // http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
        // http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
        // It also works on the youtube-nocookie.com URL with the same above options.
        // It will also pull the ID from the URL in an embed code (both iframe and object tags)
        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $urlParams, $match);
        
        return $match[1];
    }


    private static function _getEnumValues($column){
        $type= Projects::select(Projects::raw("SHOW COLUMNS FROM projects WHERE Field = '{$column}'"))[0]->Type ;
        preg_match('/^enum((.*))$/',$type,$matches)->get();
        $enum=array();

        foreach(explode(',',$matches[1])as$value){
            $v=trim($value,"'");
            $enum=array_add($enum,$v,$v);
        }

        return $enum;
    }

}
