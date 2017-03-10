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

    public static function getAllBelongsTo($id)
    {
        $bids = DB::select('SELECT * FROM Bids WHERE user_id=?', [$id]);
        return $bids;
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
