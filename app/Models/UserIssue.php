<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'content',
    ];

    public function username(){
        return $this->belongsTo(User::class, 'user_id')->select(['id', 'Lname', 'Fname', 'Lname']);
    }
}
