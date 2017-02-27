<?php

namespace Taskr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'category', 'owner', 'status',
    ];

    public function bids() {
        return $this->hasMany(Bid::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function addBid($price) {
        $this->bids()->create([
            'price' => $price,
            'user_id' => Auth::id(),
        ]);
    }
}
