<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectStats;

class ProjectStatController extends Controller
{
    public function getProjectStats(int $projectIdArg)
    {
        $statsVar = ProjectStats::where('proj_id', '=', $projectIdArg)->select('support_count', 'follow_count', 'donation_count')->first()->toArray();

        return (count($statsVar) > 0) ? $statsVar : null;
    }
}
