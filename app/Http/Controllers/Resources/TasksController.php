<?php

namespace Taskr\Http\Controllers\Resources;

use \stdClass;
use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Tasks;
use Taskr\Repositories\Users;
use Taskr\Repositories\Bids;
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
    protected $bidsRepo;

    public function __construct(Tasks $tasks, Users $users, Bids $bids)
    {
        $this->tasksRepo = $tasks;
        $this->usersRepo = $users;
        $this->bidsRepo = $bids;
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
        $bids = [];
        if (Auth::check()) {
            $id = Auth::id();
            $user = $this->usersRepo->getUser($id);
            $bids = $this->bidsRepo->getBids($task->id);
            $taskOwner = $this->usersRepo->getUser($task->owner);
        }
        return view('tasks.show', compact('task', 'user', 'bids', 'taskOwner'));
    }

    public function create()
    {
        $generic_tasks = (object)DB::select("select * from generic_tasks");
        return view('tasks.create', compact('generic_tasks'));
    }

    public function edit(Task $task)
    {
        $generic_tasks = (object)DB::select("select * from generic_tasks");
        return view('tasks.edit', compact('task', 'generic_tasks'));
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
        $this->tasksRepo->update($task->id,
            $request->input('title'),
            $request->input('description'),
            $request->input('category'),
            $request->input('start_date'),
            $request->input('end_date'));
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
            'category' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:today'
        ]);
    }

    public function store(Request $request)
    {
        $this->validateTask($request);
        $defaultStatus = 0;
        $this->tasksRepo->insert($request->input('title'),
            $request->input('description'),
            $request->input('category'),
            Auth::id(),
            $defaultStatus,
            $request->input('start_date'),
            $request->input('end_date'));
        return redirect('/tasks');
    }
}
