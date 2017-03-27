<?php

namespace Taskr\Repositories;

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
        $tasks = DB::select('SELECT * FROM bids');
        return $tasks;
    }

    public function belongsTo($id)
    {
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE user_id=?
            AND b.task_id = t.id AND t.owner = u.id', [$id]);
        return $bids;
    }

    public function getOpenedBids($id)
    {
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE user_id=?
            AND b.task_id = t.id AND t.owner = u.id AND t.status=0', [$id]);
        return $bids;
    }

    public function getSelectedBids($id)
    {
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE user_id=?
            AND b.task_id = t.id AND t.owner = u.id AND b.selected=true', [$id]);
        return $bids;
    }

    public function getBids($taskId)
    {
        $bids = DB::select('SELECT b.*, u.first_name, u.last_name FROM Bids b INNER JOIN Users u ON u.id = b.user_id WHERE b.task_id=?',
            [$taskId]);
        return $bids;
    }

    public function deleteBid($id)
    {
        $deleted = DB::delete('DELETE FROM users WHERE id = ?', [$id]);
        return $deleted;
    }

    public function insertBid($taskId, $userId, $price)
    {
        $bid = DB::insert('INSERT INTO users (task_id, user_id, price) VALUES (?, ?, ?)', [$taskId, $userId, $price]);
        return $bid;
    }

    public function updateBid($bid)
    {
        DB::update('UPDATE users SET task_id = ?, user_id = ?, price = ? WHERE id = ?',
            [$bid->task_id, $bid->user_id, $bid->price, $bid->id]);
    }
}
