<?php

namespace Taskr\Http\Controllers\Resources;

use \stdClass;
use Illuminate\Support\Facades\Auth;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\GenericTasks;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Taskr\GenericTask;

use Illuminate\Support\Facades\DB;

/**
 * Class GenericTasksController
 *
 * @package Taskr\Http\Controllers\Resources
 */
class GenericTasksController extends Controller
{
    protected $genericTasksRepo;

    public function __construct(GenericTasks $genericTasks)
    {
        $this->genericTasksRepo = $genericTasks;
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
        $genericTasks = $this->genericTasksRepo->all();
        return view('generic-tasks.index', compact('genericTasks'));
    }

    public function create()
    {
        return view('generic-tasks.create');
    }

    public function edit(GenericTask $genericTask)
    {
        return view('generic-tasks.edit', compact('genericTask'));
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
    public function update(Request $request, GenericTask $genericTask)
    {
        $this->validateGenericTask($request);
        $this->genericTasksRepo->update($genericTask->id, $request->input('name'), $request->input('category'));
        return redirect('/generic-tasks');
    }

    public function destroy($id)
    {
        $this->genericTasksRepo->delete($id);
        return redirect('/generic-tasks');
    }

    private function validateGenericTask(Request $request) {
        $this->validate($request, ['name' => 'required|max:255']);
    }

    public function store(Request $request)
    {
        $this->validateGenericTask($request);
        $this->genericTasksRepo->insert($request->input('name'), $request->input('category', ""));
        return redirect('/generic-tasks');
    }
}
