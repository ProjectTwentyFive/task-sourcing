<?php

namespace Taskr\Http\Controllers\Resources;

use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Tasks;
use Illuminate\Support\Facades\Validator;
use Taskr\Task;

use Illuminate\Support\Facades\DB;

/**
 * Class TasksController
 *
 * @package Taskr\Http\Controllers\Resources
 */
class TasksController extends Controller
{
    protected $tasksRepo;

    public function __construct(Tasks $tasks)
    {
        $this->tasksRepo = $tasks;
    }

    /*
    |--------------------------------------------------------------------------
    | View Methods
    |--------------------------------------------------------------------------
    |
    | These methods should return views with the appropriate data bind to it.
    |
    */
    public function index()
    {
        $tasks = DB::select("SELECT * FROM TASKS");
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function edit()
    {

    }

    /*
    |--------------------------------------------------------------------------
    | Resource Methods
    |--------------------------------------------------------------------------
    |
    | These methods should not return any views but instead process the
    | appropriate actions instead.
    |
    */
    public function update()
    {
        DB::update("UPDATE Tasks SET ");
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM tasks WHERE id = ?", [$id]);
        return redirect('/');
    }

    public function store()
    {
        $ownerId = Auth::id();
        $defaultStatus = 0;

        $this->validate(request(), [
            'title' => 'required|max:15',
            'description' => 'required',
            'start_date' => 'date|after_or_equal:today',
            'end_date' => 'date|after:today'
        ]);

        $title = request('title');
        $description = request('description');
        $category = request('category', null);
        $start_date = request('start_date', null);
        $end_date = request('end_date', null);

        DB::insert("INSERT INTO tasks (title, description, category, owner, status, start_date, end_date) values (
            '{$title}',
            '{$description}',
            '{$category}',
            {$ownerId},
            {$defaultStatus},
            '{$start_date}',
            '{$end_date}')");

        return redirect('/');
    }
}
