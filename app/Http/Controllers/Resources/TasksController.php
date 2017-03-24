<?php

namespace Taskr\Http\Controllers\Resources;

use \stdClass;
use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Tasks;
use Taskr\Repositories\Users;
use Illuminate\Support\Facades\Validator;
use Taskr\Task;
use Illuminate\Http\Request;

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
        $tasks = $this->tasksRepo->all();
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

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
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
    public function update(Request $request, Task $task)
    {
        $this->validateTask($request);
        $this->tasksRepo->update($task->id, $request->input('title'), $request->input('description'), $request->input('category'));
        return redirect('/tasks');
    }

    public function updateStatus($id, $status)
    {
        if ($status >= 0 && $status <= 2) {
            $this->tasksRepo->updateStatus($id, $status);
        }
        return back();
    }

    public function destroy($id)
    {
        $this->tasksRepo->delete($id);
        return redirect('/tasks');
    }

    private function validateTask(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:15',
            'description' => 'required',
            'start_date' => 'nullable|date|after_or_equal:today',
            'end_date' => 'nullable|date|after:today'
        ]);
    }

    public function store(Request $request)
    {
        $this->validateTask($request);

        $title = $request->input('title');
        $description = $request->input('description');
        $category = $request->input('category', null);
        $start_date = $request->input('start_date', null);
        $end_date = $request->input('end_date', null);
        $ownerId = Auth::id();
        $defaultStatus = 0;

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

        return redirect('/tasks');
    }
}
