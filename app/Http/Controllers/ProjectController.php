<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects; 
use App\Models\ProjectTiers;

class ProjectController extends Controller
{
    public function index()
    {
        return view('pages.projectViewPage');
    }


    /***
     * Public function to get the input from the user
     */
    public function saveCreatedProject(Request $request)
    {

        $data = new Projects;
        $data->user_id = $request->session()->get('loginId');
        $data->title = $request->ProjTitle;
        $data->description = $request->ProjDesc;
        $data->tags = implode(',', $request->Tags);
        $data->target_amt = $request->ProjTarget;
        $data->yt_link= $request->ProjVideo;
        // $data->img = 
        // $data->target_date = 
        $data->save();

        // Saving Tiers
        $this->_saveTiers($data, $request);
        
        // Note to future RamonDev Redirect to Project view page.
        return redirect('/');

    }


    private function _saveTiers($data, $request)
    {
        $currentTier = 1;
        for ($index = 0; $index < 3; $index++)
        {
            $tier = new ProjectTiers;
            $tier->proj_id = $data->id;
            // $tier->user_id = $data->user_id;
            $tier->level = $currentTier;

            $tier->name = $request->Tier[$index]['name'];
            $tier->amount = 1; //$request->$tier[$index]['amount'];
            $tier->benefit = "yes"; //$request->$tier[$index]['benefit'];

            $tier->save();
            $currentTier += 1;
        }
    }

}
