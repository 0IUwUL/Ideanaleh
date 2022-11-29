<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User; 
class ProjectComments extends Model
{
    use HasFactory;

    public function user()
    {
        // https://stackoverflow.com/a/19860503
        return $this->belongsTo(User::class)->select(['id', 'Lname','Fname','Mname','icon']);;
    }
}
