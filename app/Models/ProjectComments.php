<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User; 
use DB;

class ProjectComments extends Model
{
    use HasFactory;

    public static function getAll(int $id): ?array
    {
        $query = json_decode(
            json_encode(
                DB::table('project_comments')
                    ->where('project_comments.proj_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->join('users', 'project_comments.user_id', '=', 'users.id')
                    ->join('projects', 'project_comments.proj_id', '=', 'projects.id')
                    ->select('project_comments.*','users.id as user_id', 'users.Lname', 'users.Fname', 'users.Mname', 'users.icon', 'projects.user_id as dev_id')
                    ->get() 
                    ->toArray()
            ),
            true) ?? null;

        return $query;
    }
}
