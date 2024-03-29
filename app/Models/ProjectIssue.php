<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'user_id',
        'subject',
        'content',
    ];

    public function project(){
        return $this->belongsTo(Projects::class, 'project_id')->select(['id', 'title', 'description']);
    }


    public function username(){
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'Lname', 'Fname', 'Mname' ,'email']);
    }
}
