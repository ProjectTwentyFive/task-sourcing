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
        $selectedBids = [];
        if (Auth::check()) {
            $id = Auth::id();
            $tasks = $this->tasksRepo->belongsTo($id);
            $bids = $this->bidsRepo->getOpenedBids($id);
            $selectedBids = $this->bidsRepo->getSelectedBids($id);

            // formatting times
            foreach($tasks as $task){
                $strToTime = strToTime($task->start_date);
                $task->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($task->end_date);
                $task->end_date = date('Y-m-d H:i', $strToTime);
            }

            foreach($bids as $bid){
                $strToTime = strToTime($bid->start_date);
                $bid->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($bid->end_date);
                $bid->end_date = date('Y-m-d H:i', $strToTime);
            }

            foreach($selectedBids as $selectedBid){
                $strToTime = strToTime($selectedBid->start_date);
                $selectedBid->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($selectedBid->end_date);
                $selectedBid->end_date = date('Y-m-d H:i', $strToTime);
            }
        }
        return view('home', compact('tasks', 'bids', 'selectedBids'));
    }
}
