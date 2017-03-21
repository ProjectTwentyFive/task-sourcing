<?php

namespace Taskr\Repositories;

use Taskr\Bid;
use Illuminate\support\Facades\DB;

/**
 * Class Bids is an repository which contains methods that combines
 * business log and data manipulation for Bid objects. It also
 * avoids namespace clashes with eloquent methods that we are not
 * able to use.
 *
 * @package Taskr\Repositories
 */
class Bids
{
    public function all()
    {
        $tasks = DB::select('select * from bids');
        return $tasks;
    }

    public function belongsTo($id)
    {
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE user_id=?
            AND b.task_id = t.id AND t.owner = u.id', [$id]);
        return $bids;
    }
}
