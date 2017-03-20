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
    | Static Model Methods
    |--------------------------------------------------------------------------
    |
    | These methods are static methods that are related to the model. Can be
    | used for code readability and reuse.
    |
    */

    public static function getAllBelongsTo($id)
    {
        $tasks = DB::select('SELECT * FROM Tasks WHERE owner=?', [$id]);
        return $tasks;
    }

    public static function getAll()
    {
        $tasks = DB::select('select * from tasks');
        return $tasks;
    }

    /*
    |--------------------------------------------------------------------------
    | Instance Model Methods
    |--------------------------------------------------------------------------
    |
    | These methods can be called from a Task object and should act as helper
    | methods for code readability and reuse.
    |
    */

    //TODO: Need to change to execute raw queries instead
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function addBid($price)
    {
        $this->bids()->create([
            'price' => $price,
            'user_id' => Auth::id(),
        ]);
    }
}
