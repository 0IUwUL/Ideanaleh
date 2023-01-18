<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;
use Mews\Purifier\Casts\CleanHtmlInput;
use Mews\Purifier\Casts\CleanHtmlOutput;

class Projects extends Model
{
    use HasFactory;

    // https://github.com/mewebstudio/Purifier for more information
    protected $casts = [
        'story'    => CleanHtml::class, // cleans when setting the value (prevents script injection and XSS)
    ];

    public function dev()
    {
        return $this->belongsTo(User::class, 'user_id')->select(['id','Lname', 'Fname', 'Mname', 'email', 'icon', 'dev_mode']);
    }
}
