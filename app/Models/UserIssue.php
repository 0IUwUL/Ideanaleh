<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIssue extends Model
{
    use HasFactory;

    public function username(){
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'Lname', 'Fname', 'Lname']);
    }
}
