<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

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
        $task = new Task;

        $task->title = request('title');
        $task->description = request('description');

        $task-save();

        return redirect('/');
    }
}
