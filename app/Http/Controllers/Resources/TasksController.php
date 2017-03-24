<?php

namespace Taskr\Http\Controllers\Resources;

use \stdClass;
use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Tasks;
use Taskr\Repositories\Users;
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
    protected $usersRepo;

    public function __construct(Tasks $tasks, Users $users)
    {
        $this->tasksRepo = $tasks;
        $this->usersRepo = $users;
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
        $user = new stdClass();
        if (Auth::check()) {
            $id = Auth::id();
            $user = $this->usersRepo->getUser($id);
        }
        $tasks = DB::select("SELECT * FROM TASKS");
        return view('tasks.index', compact('tasks', 'user'));
    }

    public function show(Task $task)
    {
        $user = new stdClass();
        if (Auth::check()) {
            $id = Auth::id();
            $user = $this->usersRepo->getUser($id);
        }
        return view('tasks.show', compact('task', 'user'));
    }

    public function create()
    {
        $generic_tasks = (object)DB::select("select * from generic_tasks");
        return view('tasks.create')->with(compact('generic_tasks'));
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
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:today'
        ]);

        $title = request('title');
        $description = request('description');
        $category = request('category', null);
        $start_date = request('start_date', null);
        $end_date = request('end_date', null);

        if ($start_date != '' && $end_date != '') {
            DB::insert("INSERT INTO tasks (title, description, category, owner, status, start_date, end_date) values (
            '{$title}',
            '{$description}',
            '{$category}',
            {$ownerId},
            {$defaultStatus},
            '{$start_date}',
            '{$end_date}')");
        } else if ($start_date != '') {
            DB::insert("INSERT INTO tasks (title, description, category, owner, status, start_date) values (
            '{$title}',
            '{$description}',
            '{$category}',
            {$ownerId},
            {$defaultStatus},
            '{$start_date}')");
        } else if ($end_date != '') {
            DB::insert("INSERT INTO tasks (title, description, category, owner, status, end_date) values (
            '{$title}',
            '{$description}',
            '{$category}',
            {$ownerId},
            {$defaultStatus},
            '{$end_date}')");
        } else {
            DB::insert("INSERT INTO tasks (title, description, category, owner, status) values (
            '{$title}',
            '{$description}',
            '{$category}',
            {$ownerId},
            {$defaultStatus})");
        }

        return redirect('/');
    }
}
