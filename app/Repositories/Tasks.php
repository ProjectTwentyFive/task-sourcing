<?php

namespace Taskr\Repositories;

use Illuminate\support\Facades\DB;

/**
 * Class Tasks is an repository which contains methods that combines
 * business log and data manipulation for Task objects. It also
 * avoids namespace clashes with eloquent methods that we are not
 * able to use.
 *
 * @package Taskr\Repositories
 */
class Tasks
{
    public function all()
    {
        $tasks = DB::select('SELECT tasks.*, users.first_name, users.last_name FROM tasks INNER JOIN users ON tasks.owner = users.id');
        return $tasks;
    }

    public function belongsTo($id)
    {
        $tasks = DB::select('SELECT t.id, t.title, t.description, t.category, t.owner, t.status, t.start_date, t.end_date,
            COUNT(b2.id) AS total_bids,
                (SELECT COUNT(*) FROM Bids b WHERE b.task_id = t.id AND b.created_at > ANY(SELECT l.logout_time FROM Logins l WHERE l.user_id = ?
                 AND l.logout_time >= ALL(
                    SELECT l2.logout_time FROM Logins l2 WHERE l.user_id = ? AND l2.logout_time IS NOT NULL)))
            AS new_bids FROM Tasks t LEFT OUTER JOIN Bids b2 ON b2.task_id = t.id WHERE t.owner=?
            GROUP BY t.id, t.title, t.description, t.category, t.owner, t.status, t.start_date, t.end_date', [$id, $id, $id]);
        return $tasks;
    }

    public function delete($id)
    {
        DB::delete("DELETE FROM tasks WHERE id = ?", [$id]);
    }

    public function insert($title, $description, $category, $owner, $status, $start_date, $end_date)
    {
        DB::insert("INSERT INTO tasks (title, description, category, owner, status, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?)",
            [$title, $description, $category, $owner, $status, $start_date, $end_date]);
    }

    public function update($id, $title, $description, $category, $start_date, $end_date)
    {
        DB::update("UPDATE tasks SET title = ?, description = ?, category = ?, start_date = ?, end_date = ? WHERE id = ?",
            [$title, $description, $category, $start_date, $end_date, $id]);
    }

    public function updateStatus($id, $status)
    {
        if ($status == 0 || $status == 1 || $status == 2) {
            DB::update("UPDATE tasks SET status = ? WHERE id = ?", [$status, $id]);
        }
    }

    public function getNumTasks($id) {
        return array_filter(
            DB::select('SELECT COUNT(*) FROM Tasks t WHERE t.owner = ?', [$id]))[0]->count;
    }
}
