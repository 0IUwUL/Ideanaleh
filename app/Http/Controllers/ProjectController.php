<?php

namespace App\Http\Controllers;

// Import Controllers
use App\Http\Controllers\UserPreferenceController;
use App\Http\Controllers\UpdatesController;
use App\Http\Controllers\CommentsController;

// Import models
use App\Models\Projects; 
use App\Models\ProjectTiers;
use App\Models\UserPreference; 

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Phpml\Association\Apriori;

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
        $projectDataVar = $this->_getProjectData($idArg);
        //dd($projectDataVar);
        return view('pages.projectViewPage')->with('project', $projectDataVar);
    }


    public function edit(int $idArg){
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


    private function _getProjectData(int $idArg){
        $projectDataVar = Projects::find($idArg)->toArray();
        // $projCategory = Projects::where('category', '=', $projectDataVar["category"])->get()->toArray();
        
        $projectDataVar = array_merge($projectDataVar, ['recommend' => $this->recommendation($projectDataVar, $idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['tiers' => $this->_getProjectTiers($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['isFollowed' => (new UserPreferenceController)->checkIfFollowed($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['updates' => (new UpdatesController)->getAllUpdates($idArg)]);
        $projectDataVar = array_merge($projectDataVar, ['comments' => (new CommentsController)->getAllProjectComments($idArg)]);

        return $projectDataVar;
    }


    /***
     * Private function to generate recommendations
     */
    private function recommendation($projectDataArg, int $idArg){

        //get all project under the visited page category
        //id,!=,Auth::id();
        $project = json_decode(
            json_encode(
                DB::table('projects')
                    ->where('id','!=',$idArg)
                    // ->where('category', $projectDataArg["category"])
                    ->where('created_at','>', Carbon::parse(Carbon::now())->setTimezone('Asia/Manila')->subDays(7))
                    ->select('id','title')
                    ->get()
                    ->toArray()
            ),
            true);

            //get all preferences of users
        $user_preferences = json_decode(
            json_encode(
                DB::table('user_preferences')
                    ->where('user_id','!=',Auth::id())
                    ->select('followed')
                    ->get()
                    ->toArray()
            ),
            true);

        //convert string of preferences to array
        for($i=0;$i<count($user_preferences);$i++) {
            $user_preferences[$i]['followed'] = array_map(fn($value) => (int) $value,
                array_filter(explode(',', $user_preferences[$i]['followed'])
            ));
        }

        //get all projects that are supported by the customers
        $projects = array();
        $allProjects = $project;
        foreach($allProjects as $key){
            $projects[$key['id']] = $key['title'];
            
        }
        
        //filter out preferences that is not found in the project list
        $prefList = array();
        foreach($user_preferences as $list){
            $temp = $list["followed"];
            $temp_arr = array();
            foreach ($temp as $tmp) {
                foreach ($projects as $key => $value) {
                    if (!($tmp == $key)) continue;
                    $tmp = $value;
                    array_push($temp_arr, $tmp);
                }
            }
            array_push($prefList, $temp_arr);
            $temp_arr = [];
        }

  
        //Apriori Algorithm of the filtered preferences and identify frequent itemsets
        $labels = [];
        $associator = new Apriori($support = 0.03, $confidence = 0.03);
        $associator->train($prefList, $labels);
        $frequent = $associator->apriori();
        
        //store frequent itemsets for recommendation
        $predict = $associator->predict(reset($frequent[count($frequent[count($frequent)])])); 

        // $reverse = $associator->predict($associator->predict(reset($frequent[count($frequent[count($frequent)])]))); 
        // $rev = [];
        
        // for($x = 0; $x < count($reverse); $x++){
        //     $rev = array_merge($rev, array_merge(array_values($reverse[$i])));
        // }
        
        $recommendation = [];

        //get preferences with atleast length of 2 based on frequent itemset
        for ($i = 2; $i <= count($frequent); $i++) {
            $temp = $frequent[$i];
            foreach ($temp as $item) {
                array_push($recommendation, $item);
            }
        }
       
        $supported_projects = [];
        if(!(Auth::Check())){
            $supported_projects = $predict[count($predict)-1];
        }
        if(Auth::check()){
            // print_r(end($frequent[count($frequent)]));
            //Authenticated user's preferences
            $personalPreferences = json_decode(
                json_encode(
                    DB::table('user_preferences')
                        ->where('user_id',Auth::id())
                        ->select('followed')
                        ->get()
                        ->toArray()
                ),
                true);

                //convert string to array

                $personalPreferences[0]['followed'] = array_filter(explode(',',$personalPreferences[0]['followed']));

                // merge followed and support and remove duplicates -- note
                if(!empty($personalPreferences[0]['followed']) && count($personalPreferences[0]['followed']) > 1){
                    
                    //get values of preferences Ids
                    $hold = array_merge(...array_values($personalPreferences[0])); 
                    $holdkey = array_flip($hold);
                    foreach($hold as $rep){
                        $holdkey[$rep] = $rep;
                    }
                        
                    //get projects based on user's preferences
                    foreach($hold as $list){
                        $tmp = json_decode(
                            json_encode(
                                DB::table('projects')
                                    
                                    ->where('id',$list)
                                    ->select('title')
                                    ->get()
                            ),
                            true);
                        $holdkey[$list] = $tmp[0];
                    }
                    
                    $preferences = $personalPreferences;
                    $preferences = $preferences[0]["followed"];


                    //get titles of project
                    foreach ($preferences as $x) {
                        $project_name = $holdkey[$x]['title'];
                        array_push($supported_projects, $project_name);
                    }
                }
                else {
                    $supported_projects = $predict[count($predict)-1];
                }
        }

        //Collaborative filtering (User-User)
        
        $recommendation_for_you=[];
        $final_rec = [];
        $final_recomendation_list=[];
        $other_recomendation_list=[];
        

        //projects based on user preferences on visited project (category)
        //check users project on the frequent itemset based on apriori
        //filter out itemsets based on user's supported projects
        foreach ($supported_projects as $product) {
            foreach ($recommendation as $rec) {
                if (in_array($product, $rec)) {
                    array_push($recommendation_for_you, $rec);
                }
            }
        }
        // clean list of container for project titles
        foreach ($recommendation_for_you as $rec) {
            $final_rec = array_merge($final_rec, $rec);
        }
        
        // remove duplicates
        $final_rec = array_unique($final_rec);
        
        // remove preferences that is already on the currently authenticated user
        foreach ($supported_projects as $val) {
            if (($key = array_search($val, $final_rec)) !== false) {
                unset($final_rec[$key]);
            }
        }
        
        //get all info of the recommended project
        foreach ($final_rec as $rec) {
            $products[$rec] = json_decode(
                json_encode(
                    DB::table('projects')
                        ->where('title',$rec)
                        ->where('category', $projectDataArg["category"])
                        ->get()
                ),
                true);
            $final_recomendation_list = array_merge($final_recomendation_list,$products[$rec]);
        }
        foreach ($final_rec as $rec) {
            $products[$rec] = json_decode(
                json_encode(
                    DB::table('projects')
                        ->where('title',$rec)
                        ->where('category', '!=', $projectDataArg["category"])
                        ->get()
                ),
                true);
            $other_recomendation_list = array_merge($other_recomendation_list,$products[$rec]);
        }
        return array($final_recomendation_list, $other_recomendation_list);
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

    private function _saveNewProject(Request $requestArg){
        
        if($requestArg->ProjId != null){
            $dataVar = Projects::find($requestArg->ProjId);
        }
        else{
            $dataVar = new Projects;
        }
        $dataVar->user_id = Auth::id();
        $dataVar->title = $requestArg->ProjTitle;
        $dataVar->description = $requestArg->ProjDesc;
        $dataVar->category = $requestArg->ProjCategory;
        $dataVar->tags = implode(',', $requestArg->Tags);
        $dataVar->target_amt = $requestArg->ProjTarget;
        $dataVar->target_milestone = $requestArg->ProjMilestone;
        $dataVar->yt_link= $this->_getYoutubeId($requestArg->ProjVideo);
        $dataVar->logo = null;
        $dataVar->banner = null;
        $dataVar->target_date = $requestArg->ProjDate;
        $dataVar->save();

        return $dataVar;
    }


    // public function updateProject(Request $requestArg){
    //     $dataVar = new Projects;
    //     $dataVar->user_id = Auth::id();
    //     $dataVar->title = $requestArg->ProjTitle;
    //     $dataVar->description = $requestArg->ProjDesc;
    //     $dataVar->category = $requestArg->ProjCategory;
    //     $dataVar->tags = implode(',', $requestArg->Tags);
    //     $dataVar->target_amt = $requestArg->ProjTarget;
    //     $dataVar->target_milestone = $requestArg->ProjMilestone;
    //     $dataVar->yt_link= $this->_getYoutubeId($requestArg->ProjVideo);
    //     $dataVar->logo = null;
    //     $dataVar->banner = null;
    //     $dataVar->target_date = $requestArg->ProjDate;
    //     $dataVar->save();

    //     // The Images are later uploaded because we need the project ID to be generated first
    //     $this->_saveImage($requestArg, $dataVar->id, 'logo', 'ProjLogo');
    //     $this->_saveImage($requestArg, $dataVar->id, 'banner', 'ProjBanner');

    //     // Saving Tiers
    //     $this->_saveTiers($dataVar->id, $requestArg);
    // }


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
            if($requestArg->Tier[$index]['id'] != null){
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

    public function _getProjects(Request $requestArg){
        $pref_categs = $requestArg->categs;
        foreach ($pref_categs as $key => $categories){
            $sample = Projects::where('category', '=', $categories)
                                ->select(array('id', 'title', 'description'))
                                ->get()
                                ->toArray();
            $project[$categories] = $sample;
        }
        
        $json_data = array("response" => $project);
        echo json_encode($json_data);
    }

}
