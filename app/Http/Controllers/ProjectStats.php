<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ProjectStats;

class ProjectStats extends Controller
{
    public function getProjectStats(int $projectIdArg)
    {
        $statsVar = ProjectStats::where('proj_id', '=', $projectIdArg)->get()->toArray();

        return (count($statsVar) > 0) ? $statsVar : null;
    }
}
