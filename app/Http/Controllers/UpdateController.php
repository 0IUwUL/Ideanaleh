<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectUpdates;

class UpdateController extends Controller
{
    public function index(int $id): array|null
    {
        $query = ProjectUpdates::where('proj_id', $id) ->orderBy('created_at', 'desc')->get();

        if ($query) return $query->toArray();

        return null;
    }

    public function store(Request $request): void
    {
        $prevUpdate = $this->getLatestUpdate($request->ProjectId);

        $newUpdate = new ProjectUpdates;
        $newUpdate->proj_id = $request->ProjectId;
        $newUpdate->title = $request->UpdateTitle;
        $newUpdate->description = $request->UpdateDesc;
        $newUpdate->save();
        
        $viewRender = null;
        // Store the previous update html for ajax response
        if($prevUpdate) $viewRender = view('formats.update')->with(['update' => $prevUpdate])->render();

        $json_data = array("update" => $newUpdate->toArray(), "prevUpdateHTML"=> $viewRender);

        echo json_encode($json_data);
    }

    public function update(ProjectUpdates $update, Request $request): void
    {
        $update->title = $request->UpdateTitle;
        $update->description = $request->UpdateDesc;
        $update->save();
    }

    public function destroy(ProjectUpdates $update): void
    {
        $update->delete();
        
        $latestUpdate = $this->getLatestUpdate($update['proj_id']);

        $json_data = array("latestUpdate" => $latestUpdate);
 
        echo json_encode($json_data);
    }

    private function getLatestUpdate(int $id): array|null
    {
        $query = ProjectUpdates::where('proj_id', $id)
                                ->latest()
                                ->join('projects', 'project_updates.proj_id', '=', 'projects.id')
                                ->select('project_updates.*', 'projects.user_id as dev_id')
                                ->first();
                                
        if ($query) return $query->toArray();

        return null;
    }
}
