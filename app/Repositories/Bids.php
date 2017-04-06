<?php

namespace Taskr\Repositories;

use Illuminate\support\Facades\DB;

use Carbon\Carbon;

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
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE b.user_id=?
            AND b.task_id = t.id AND t.owner = u.id AND t.status=0', [$id]);
        return $bids;
    }

    public function getSelectedBids($id)
    {
        $bids = DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE b.user_id=?
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
        $deleted = DB::delete('DELETE FROM Bids b WHERE id = ?', [$id]);
        return $deleted;
    }

    public function insertBid($taskId, $userId, $price)
    {
        // Should not be manually entering created_at but database would not store local time by default no matter what I did
        $bid = DB::insert('INSERT INTO Bids (task_id, user_id, price, created_at) VALUES (?, ?, ?, ?)', [$taskId, $userId, $price, Carbon::now()]);
        return $bid;
    }

    public function getNumOpenedBids($id) {
        return array_filter(
            DB::select('SELECT COUNT(*) FROM Bids b, Tasks t WHERE b.user_id = ? AND b.task_id = t.id AND t.status = 0', [$id]))[0]->count;
    }

    public function getNumSelectedBids($id) {
        return array_filter(
            DB::select('SELECT COUNT(*) FROM Bids b WHERE b.user_id = ? AND b.selected=true', [$id]))[0]->count;
    }

    public function getNumBids($id) {
        return array_filter(
            DB::select('SELECT COUNT(*) FROM Bids b WHERE b.task_id = ?', [$id]))[0]->count;
    }

    public function updateBid($bid)
    {
        DB::update('UPDATE users SET task_id = ?, user_id = ?, price = ? WHERE id = ?',
            [$bid->task_id, $bid->user_id, $bid->price, $bid->id]);
    }

    public function getCompletedBids($id) {
        return DB::select('SELECT * FROM Bids b, Tasks t, Users u WHERE b.task_id = t.id AND b.selected=true AND t.status = 2 AND b.user_id = ? AND t.owner = u.id',
                [$id]);
    }

    public function getNumCompletedBids($id) {
        return array_filter(
            DB::select('SELECT COUNT(*) FROM Bids b, Tasks t WHERE b.task_id = t.id AND b.selected=true AND t.status = 2 AND b.user_id = ?',
                [$id]))[0]->count;
    }
}
