<?php

namespace Taskr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use DB;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'owner',
        'status',
    ];

    /*
    |--------------------------------------------------------------------------
    | Instance Model Methods
    |--------------------------------------------------------------------------
    |
    | These methods can be called from a Task object and should act as helper
    | methods for code readability and reuse.
    |
    */
}
