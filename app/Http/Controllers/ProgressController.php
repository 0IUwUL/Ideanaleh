<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectProgress;

class ProgressController extends Controller
{
    public function getAllProgress(int $id)
    {
        $query = ProjectProgress::where('proj_id', $id) ->orderBy('created_at', 'desc')->get();

        if ($query) return $query->toArray();

        return null;
    }

    private function getLatestProgress(int $id)
    {
        $query = ProjectProgress::where('proj_id', $id)->orderBy('created_at', 'desc')->first();

        if ($query) return $query->toArray();

        return null;
    }

    public function create(Request $request)
    {
        $prevProgress = $this->getLatestProgress($request->ProjectId);

        $newProgress = new ProjectProgress;
        $newProgress->proj_id = $request->ProjectId;
        $newProgress->title = $request->ProgressTitle;
        $newProgress->description = $request->ProgressDesc;
        $newProgress->save();
        $newProgress = $newProgress->toArray();
        
        // Pass the new progress and add prevProgress if not null
        $progress = array($newProgress);
        if($prevProgress){
            array_push($progress, $prevProgress);
        }

        $json_data = array("progress" => $progress);

        echo json_encode($json_data);
    }
}
