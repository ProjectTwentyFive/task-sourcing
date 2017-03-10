<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Task;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$tasks = [];
		if (Auth::check())
		{
			$id = Auth::id();
			$tasks = Task::getAllBelongsTo($id);
		}
	    return view('home', compact('tasks'));
    }
}