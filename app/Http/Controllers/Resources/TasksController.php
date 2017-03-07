<?php

namespace Taskr\Http\Controllers\Resources;

use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Task;

/**
 * Class TasksController
 *
 * @package Taskr\Http\Controllers\Resources
 */
class TasksController extends Controller
{

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
        $tasks = Task::all();
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

    }

    public function delete()
    {

    }

    public function store()
    {
        $ownerId = Auth::id();
        $defaultStatus = 0;

        $this->validate(request(), [
            'title' => 'required|max:15',
            'description' => 'required'
        ]);

        Task::create([
            'title' => request('title'),
            'description' => request('description'),
            'category' => request('category'),
            'owner' => $ownerId,
            'status' => $defaultStatus,
        ]);

        return redirect('/');
    }
}
