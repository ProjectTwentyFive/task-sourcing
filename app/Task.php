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

    public static function getAllBelongsTo($id)
    {
        $tasks = DB::select('SELECT * FROM Tasks WHERE owner=?',[$id]);
        return $tasks;
    }

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
