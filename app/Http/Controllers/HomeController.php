<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Task;
use Taskr\Bid;

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
		$bids = [];
		if (Auth::check())
		{
			$id = Auth::id();
			$tasks = Task::getAllBelongsTo($id);
			$bids = Bid::getAllBelongsTo($id);
		}
	    return view('home', compact('tasks', 'bids'));
    }
}