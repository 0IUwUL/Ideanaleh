<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

use App\Models\UserPreference; 

class UserPreferenceController extends Controller
{
    public function createInitialUserPreference(int $userIdArg)
    {
        $userPreferenceVar = new UserPreference;
        $userPreferenceVar->user_id = $userIdArg;
        $userPreferenceVar->save();
    }


    public function updateFollowed(Request $requestArg)
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->followed != null){

                $initialFollowedVar = explode(',', $currentUserVar->followed);

                if(in_array($requestArg->ProjectId, $initialFollowedVar)){
                    // Deleting
                    $trimmedVar = array_diff($initialFollowedVar, array($requestArg->ProjectId));
                    $currentUserVar->followed = implode(',', $trimmedVar);

                    $json_data = array("response" => "unfollowed", "trrimed" => $trimmedVar);
                }
                else{
                    // Adding
                    $mergedArrayVar = array_merge($initialFollowedVar, array($requestArg->ProjectId));     
                    sort($mergedArrayVar);

                    $currentUserVar->followed = implode(',', $mergedArrayVar);
                    $json_data = array("response" => "followed");
                }
            }
            else{
                // Initial
                $currentUserVar->followed = strval($requestArg->ProjectId);
                $json_data = array("response" => "followed");
            }
            $currentUserVar->save();
        }
        else{
            $json_data = array("response" => "fail");
        }

        echo json_encode($json_data);
    }


    private function _getCurrentUser()
    {
        $userIdVar = Auth::id();
        return(UserPreference::where('user_id', '=', $userIdVar)->first());
    }


    public function checkIfFollowed(int $projectIdArg)
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->followed){
                if(Str::contains($currentUserVar->followed, $projectIdArg)){
                    return(true);
                }
                else{
                    return(false);
                }
            }
            else{
                return(false);
            }
        }
        else{
            return(false);
        }
    }

}
