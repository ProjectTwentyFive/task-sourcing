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
        $tasks = DB::select('SELECT * FROM Tasks WHERE owner=?', [$id]);
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
}
