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


    public function addFollowed(Request $requestArg)
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->followed != null){
                $initialFollowedVar = $currentUserVar->followed;
                $currentUserVar->followed = $initialFollowedVar.strval($requestArg->ProjectId).',';
            }
            else{
                $currentUserVar->followed = strval($requestArg->ProjectId).',';
            }
            $currentUserVar->save();
        }

        //Note to future Ramon convert to an Ajax call -RamonDev
        return(redirect("project/view/".$requestArg->ProjectId));
    }


    public function deleteFollowed(Request $requestArg)
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->followed != null){
                $trimmedVar = str_replace($requestArg->ProjectId.',', '', $currentUserVar->followed);
                $currentUserVar->followed = $trimmedVar;
                $currentUserVar->save();
            }
        }
        
        //Note to future Ramon convert to an Ajax call -RamonDev
        return(redirect("project/view/".$requestArg->ProjectId));
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
