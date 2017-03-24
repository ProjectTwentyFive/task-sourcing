<?php

namespace Taskr\Http\Controllers\Resources;

use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Tasks;
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
        $tasks = $this->tasksRepo->all();
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

    public function destroy($id)
    {
        $this->tasksRepo->delete($id);
        return redirect('/tasks');
    }

    public function store(Request $request)
    {
        $this->validateTask($request);
        $this->tasksRepo->insert($request->input('title'), $request->input('description'), $request->input('category', null));

        return redirect('/tasks');
    }

    private function validateTask(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:15',
            'description' => 'required'
        ]);
    }
}
