<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

use App\Models\UserPreference; 
use App\Models\Projects;

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
                    $this->_updateFollowedCount((int)$requestArg->ProjectId, -1);
                }
                else{
                    // Adding
                    $mergedArrayVar = array_merge($initialFollowedVar, array($requestArg->ProjectId));     
                    sort($mergedArrayVar);

                    $currentUserVar->followed = implode(',', $mergedArrayVar);
                    $json_data = array("response" => "followed");

                    $this->_updateFollowedCount((int)$requestArg->ProjectId, 1);
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

                $this->_updateSupportCount($projectIdArg, 1);
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
        if(!Auth::check()) return(false);

        $currentUserVar = $this->_getCurrentUser();
        if(!($currentUserVar->followed)) return(false);
        $initialFollowedVar = explode(',', $currentUserVar->followed);

        if(in_array($projectIdArg, $initialFollowedVar)) return(true);
        return(false);
    }


    public function checkIfSupported(int $projectIdArg): bool
    {
        if(!Auth::check()) return(false);

        $currentUserVar = $this->_getCurrentUser();
        if(!$currentUserVar->supported) return(false);
        $initialSupportedVar = explode(',', $currentUserVar->supported);

        if(in_array($projectIdArg, $initialSupportedVar)) return(true);
        return(false);
    }

    
    private function _updateFollowedCount(int $projectIdArg, int $amountArg): void
    {
        $projectVar = Projects::where('id', $projectIdArg)->first();
        $initailFollowCountVar = (int)$projectVar->follow_count;

        $projectVar->follow_count = $initailFollowCountVar + $amountArg;
        $projectVar->save();
    }


    private function _updateSupportCount(int $projectIdArg, int $amountArg): void
    {
        $projectVar = Projects::where('id', $projectIdArg)->first();
        $initailSupportCountVar = (int)$projectVar->support_count;

        $projectVar->follow_count = $initailSupportCountVar + $amountArg;
        $projectVar->save();
    }
}
