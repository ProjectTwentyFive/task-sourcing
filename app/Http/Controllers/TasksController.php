<?php

namespace Taskr\Http\Controllers;

use Illuminate\Http\Request;

use Taskr\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) {
        return view('tasks.show', compact('task'));
    }

    public function create() {
        return view('tasks.create');
    }

    public function store() {
        $ownerId = Auth::id();
        $defaultStatus = 0;

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
