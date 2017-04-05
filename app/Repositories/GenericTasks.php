<?php

namespace Taskr\Repositories;

use Taskr\Bid;
use Illuminate\support\Facades\DB;

use Carbon\Carbon;

/**
 * Class GenericTasks is an repository which contains methods that combines
 * business log and data manipulation for GenericTask objects. It also
 * avoids namespace clashes with eloquent methods that we are not
 * able to use.
 *
 * @package Taskr\Repositories
 */
class GenericTasks
{
    public function all()
    {
        $tasks = DB::select('SELECT * FROM generic_tasks');
        return $tasks;
    }

    public function delete($id)
    {
        return DB::delete('DELETE FROM generic_tasks WHERE id = ?', [$id]);
    }

    public function insert($name, $category)
    {
        // Should not be manually entering created_at but database would not store local time by default no matter what I did
        return DB::insert('INSERT INTO generic_tasks (name, category, created_at) VALUES (?, ?, ?)', [$name, $category, Carbon::now()]);
    }

    public function update($id, $name, $category)
    {
        DB::update('UPDATE generic_tasks SET name = ?, category = ? WHERE id = ?',
            [$name, $category, $id]);
    }
}
