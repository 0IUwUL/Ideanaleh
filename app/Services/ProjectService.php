<?php

namespace App\Services;

use DB;
use Auth;
use Carbon\Carbon;
use Phpml\Association\Apriori;

class ProjectService {

    public function popularProjects(): array
    {
        
        //get all preferences of users
        $user_preferences = json_decode(
            json_encode(
                DB::table('user_preferences')
                    ->select('followed','supported')
                    ->get()
                    ->toArray()
            ),
            true);
            $merge = "";
            //convert string of preferences to array
        for($i=0;$i<count($user_preferences);$i++) {
            //combine followed and supported projects
            $user_preferences[$i]['followed'] = $user_preferences[$i]['followed'].','.$user_preferences[$i]['supported'];
            //filter to get unique values from the string
            $user_preferences[$i]['followed'] = implode(',', array_unique(explode(',', $user_preferences[$i]['followed'])));
            $merge = $merge.','.$user_preferences[$i]['followed'];
            $projectsCount = array_map(fn($value) => (int) $value,
            array_filter(explode(',', $merge)
            ));
        }
        // count all frequency of unique values (number of popularity for projects)
        $merge = array_count_values($projectsCount);
        arsort($merge);
        $merge = array_keys($merge);
        $popular = [];
        foreach ($merge as $list) {
            $products[$list] = json_decode(
                json_encode(
                    DB::table('projects')
                        ->where('id',$list)
                        ->get()
                ),
                true);
            if(!empty(array_filter($products[$list]))) {
                $timeForHumans = array('date' => Carbon::createFromTimeStamp(strtotime($products[$list][0]['created_at']))->diffForHumans());
                $products[$list][0] = array_merge($products[$list][0], $timeForHumans);
            }
            $popular = array_merge($popular,$products[$list]);
            
        }
        // echo"<pre>"; print_r($popular); die();
        return array($popular);
       
        
    }
    /***
     * Private function to generate recommendations
     */
    public function recommendation(?array $projectDataArg, int $idArg): array
    {

        //get all project under the visited page category
        //id,!=,Auth::id();
        //for home page
        if($projectDataArg==null){
            $project = json_decode(
                json_encode(
                    DB::table('projects')
                        ->select('id','title')
                        ->get()
                        ->toArray()
                ),
                true);
        }
        else{ //for project view page
            $project = json_decode(
                json_encode(
                    DB::table('projects')
                        ->where('id','!=',$idArg)
                        // ->where('category', $projectDataArg["category"])
                        // ->where('created_at','>', Carbon::parse(Carbon::now())->setTimezone('Asia/Manila')->subDays(7))
                        ->select('id','title')
                        ->get()
                        ->toArray()
                ),
                true);
        }
        

            //get all preferences of users
        $user_preferences = json_decode(
            json_encode(
                DB::table('user_preferences')
                    ->where('user_id','!=',Auth::id())
                    ->select('followed','supported')
                    ->get()
                    ->toArray()
            ),
            true);
            
        //convert string of preferences to array
        for($i=0;$i<count($user_preferences);$i++) {
            $user_preferences[$i]['followed'] = $user_preferences[$i]['followed'].','.$user_preferences[$i]['supported'];
            $user_preferences[$i]['followed'] = array_map(fn($value) => (int) $value,
                array_filter(explode(',', $user_preferences[$i]['followed'])
            ));
            $user_preferences[$i]['followed'] = array_unique($user_preferences[$i]['followed']);
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
        
        // get rules + confidence
        // $assoc = $associator->getRules();
        // for ($i = 0; $i < count($assoc); $i++) {
        //     $rules[$i]['Association_Rule'] = implode(",",$assoc[$i]['antecedent']);
        //     $rules[$i]['result'] = implode(",",$assoc[$i]['consequent']);
        //     $rules[$i]['support_AUB'] = $assoc[$i]['support'];
        //     $rules[$i]['confidence'] = $assoc[$i]['confidence'];
        // }
        // echo"<pre>"; print_r($rules); die();


        // //get support/frequency
        // for ($i = 0; $i <= count($frequent); $i++) {
        //     if (!empty($frequent[$i])) {
        //         for ($j = 0; $j <= count($frequent[$i]); $j++) {
        //             if (!empty($frequent[$i][$j])) {
        //                 $tempVar = $frequent[$i][$j];
        //                 $iteration[$i][$j]['itemset'] = implode(",", $tempVar);
        //                 $iteration[$i][$j]['support'] = $associator->support($tempVar);
        //                 $iteration[$i][$j]['frequency'] = $associator->frequency($tempVar);
                        
        //             }
        //         }
        //     }
        // }
        // echo "<pre>"; print_r($iteration);
        // echo "<pre>"; print_r($frequent[1][0]); print_r($frequent[4][0]);
        // print_r($associator->confidence($frequent[1][0],$frequent[4][0]));
        // echo "<pre>"; print_r($frequent); print_r($associator->support($frequent[1][0])); die();


        //support = Freq(X,Y)/N
        //Confidence = Freq(X,Y)/Freq(X)
        //Lift = Support / Sup(X) * Sup(Y)

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
                        ->select('followed','supported')
                        ->get()
                        ->toArray()
                ),
                true);

                //merge follow and support and convert string to array
                $personalPreferences[0]['followed'] = $personalPreferences[0]['followed'].','.$personalPreferences[0]['supported'];
                $personalPreferences[0]['followed'] = array_filter(explode(',',$personalPreferences[0]['followed']));
                unset($personalPreferences[0]['supported']);
                
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
                    
                    $preferences = $personalPreferences[0]["followed"];

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
        // for home page
        if($projectDataArg==null){
            foreach ($final_rec as $rec) {
                $others[$rec] = json_decode(
                        json_encode(
                            DB::table('projects')
                                ->where('title',$rec)
                                
                                ->get()
                        ),
                        true);
                //get date timestamp for view
                if(!empty(array_filter($others[$rec]))) {
                    $timeForHumans = array('date' => Carbon::createFromTimeStamp(strtotime($others[$rec][0]['created_at']))->diffForHumans());
                    $others[$rec][0] = array_merge($others[$rec][0], $timeForHumans);
                }
                
                $other_recomendation_list = array_merge($other_recomendation_list,$others[$rec]);
            }
           
            return $other_recomendation_list;
        }
        // for project view page
        foreach ($final_rec as $rec) {
            $products[$rec] = json_decode(
                json_encode(
                    DB::table('projects')
                        ->where('title',$rec)
                        ->where('category', $projectDataArg["category"])
                        ->get()
                ),
                true);
            $others[$rec] = json_decode(
                    json_encode(
                        DB::table('projects')
                            ->where('title',$rec)
                            ->where('category', '!=', $projectDataArg["category"])
                            ->get()
                    ),
                    true);
            //get date timestamp for view
            if(!empty(array_filter($products[$rec]))) {
                $timeForHumans = array('date' => Carbon::createFromTimeStamp(strtotime($products[$rec][0]['created_at']))->diffForHumans());
                $products[$rec][0] = array_merge($products[$rec][0], $timeForHumans);
            }
            if(!empty(array_filter($others[$rec]))) {
                $timeForHumans = array('date' => Carbon::createFromTimeStamp(strtotime($others[$rec][0]['created_at']))->diffForHumans());
                $others[$rec][0] = array_merge($others[$rec][0], $timeForHumans);
            }
            $final_recomendation_list = array_merge($final_recomendation_list,$products[$rec]);
            $other_recomendation_list = array_merge($other_recomendation_list,$others[$rec]);
        }
        
        return array($final_recomendation_list, $other_recomendation_list);
    }
}
