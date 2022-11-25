<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import model
use App\Models\ProjectProgress;

class ProgressController extends Controller
{
    public function getProjectProgress(int $id)
    {
        $query = ProjectProgress::where('proj_id', $id) ->orderBy('created_at', 'desc')->get();

        if ($query) return $query->toArray();

        return null;
    }

    public function create(Request $request)
    {
        $data = new ProjectProgress;
        $data->proj_id = $request->ProjectId;
        $data->title = $request->ProgressTitle;
        $data->description = $request->ProgressDesc;
        $data->save();

        return redirect('project/view/'.$request->ProjectId);
    }
}
