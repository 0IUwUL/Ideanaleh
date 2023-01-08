<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

use App\Models\UserPreference; 

class UserPreferenceController extends Controller
{
    public function createInitialUserPreference(array $dataArg): void
    {
        $userPreferenceVar = new UserPreference;
        $userPreferenceVar->user_id = $dataArg['id'];
        $userPreferenceVar->followed = $dataArg['pref_projs'];
        $userPreferenceVar->save();
    }

    public function _getAllPreferences(string $var): array
    {
        $pref = UserPreference::select($var)
                                ->get()
                                ->toArray();
        return $pref;
    }

    public function _getUserPreferences(int $id): array
    {
        $pref = UserPreference::where('user_id', '=', $id)
                                ->select('followed')
                                ->get()
                                ->toArray();
        return $pref;
    }

    public function googleUpdatepreferences(array $dataArg): void
    {
        $user_id = $dataArg['id'];
        $followed = array(
            'followed' => $dataArg['pref_projs'],
        );
        UserPreference::where('user_id', $user_id)->update($followed);
    }

    public function updateFollowed(Request $requestArg): void
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


    public function updateSupported(int $projectIdArg): void
    {
        // $userIdVar = Auth::id();
        $currentUserVar = $this->_getCurrentUser();
        if($currentUserVar->supported != null){

            $initialSupported = explode(',', $currentUserVar->supported);

            if(!(in_array($projectIdArg, $initialSupported))){
                $mergedArrayVar = array_merge($initialSupported, array($projectIdArg));     
                sort($mergedArrayVar);

                $currentUserVar->supported = implode(',', $mergedArrayVar);
            }
        }
        else{
            // Initial
            $currentUserVar->supported = strval($projectIdArg);
        }
        $currentUserVar->save();
    }


    private function _getCurrentUser(): Object
    {
        $userIdVar = Auth::id();
        return(UserPreference::where('user_id', '=', $userIdVar)->first());
    }


    public function checkIfFollowed(int $projectIdArg): bool
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->followed){
                $initialFollowedVar = explode(',', $currentUserVar->followed);
                if(in_array($projectIdArg, $initialFollowedVar)){
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

    public function checkIfSupported(int $projectIdArg): bool
    {
        if(Auth::check()){
            $currentUserVar = $this->_getCurrentUser();
            if($currentUserVar->supported){
                $initialSupportedVar = explode(',', $currentUserVar->supported);
                if(in_array($projectIdArg, $initialSupportedVar)){
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
