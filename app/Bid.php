<?php

namespace Taskr;

use Illuminate\Database\Eloquent\Model;

use DB;

class Bid extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'task_id',
        'price',
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

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
