<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectUpdates;

class UpdatesController extends Controller
{
    public function getAllUpdates(int $id)
    {
        $query = ProjectUpdates::where('proj_id', $id) ->orderBy('created_at', 'desc')->get();

        if ($query) return $query->toArray();

        return null;
    }

    private function getLatestUpdates(int $id)
    {
        $query = ProjectUpdates::where('proj_id', $id)->orderBy('created_at', 'desc')->first();

        if ($query) return $query->toArray();

        return null;
    }

    public function create(Request $request)
    {
        $prevUpdate = $this->getLatestUpdates($request->ProjectId);

        $newUpdate = new ProjectUpdates;
        $newUpdate->proj_id = $request->ProjectId;
        $newUpdate->title = $request->UpdateTitle;
        $newUpdate->description = $request->UpdateDesc;
        $newUpdate->save();
        
        
        // Store the previous update html for ajax response
        if($prevUpdate){
            $viewRender = view('formats.update')->with('update', $prevUpdate)->render();
        }else
            $viewRender = null;

        $json_data = array("update" => $newUpdate->toArray(), "prevUpdateHTML"=> $viewRender);

        echo json_encode($json_data);
    }
}
