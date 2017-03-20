<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Repositories\Bids;
use Taskr\Repositories\Tasks;

class HomeController extends Controller
{

    protected $tasksRepo, $bidsRepo;

    public function __construct(Tasks $tasks, Bids $bids)
    {
        $this->tasksRepo = $tasks;
        $this->bidsRepo = $bids;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = [];
        $bids = [];
        if (Auth::check()) {
            $id = Auth::id();
            $tasks = $this->tasksRepo->belongsTo($id);
            $bids = $this->bidsRepo->belongsTo($id);
        }
        return view('home', compact('tasks', 'bids'));
    }
}
