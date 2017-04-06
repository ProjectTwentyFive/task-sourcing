<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Repositories\Bids;
use Taskr\Repositories\Tasks;
use Taskr\Repositories\Users;

class HomeController extends Controller
{

    protected $tasksRepo, $bidsRepo;

    public function __construct(Tasks $tasks, Bids $bids, Users $users)
    {
        $this->tasksRepo = $tasks;
        $this->bidsRepo = $bids;
        $this->usersRepo = $users;
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
        $isCommonTasksCreator = false;
        if (Auth::check()) {
            $id = Auth::id();
            $tasks = $this->tasksRepo->belongsTo($id);
            $bids = $this->bidsRepo->getOpenedBids($id);
            $selectedBids = $this->bidsRepo->getSelectedBids($id);
            $numOpenBids = $this->bidsRepo->getNumOpenedBids($id);
            $numTasks = $this->tasksRepo->getNumTasks($id);
            $numSelectedBids = $this->bidsRepo->getNumSelectedBids($id);
            $completedBids = $this->bidsRepo->getCompletedBids($id);
            $numCompletedBids = $this->bidsRepo->getNumCompletedBids($id);
            $tasksCompletedForYou = $this->tasksRepo->getTasksCompletedForYou($id);
            $numTasksCompletedForYou = $this->tasksRepo->getNumTasksCompletedForYou($id);
            $isCommonTasksCreator = $this->usersRepo->checkIfUserCreatedTasksOfAllGenericCategory($id);

            // formatting times
            foreach ($tasks as $task) {
                $strToTime = strToTime($task->start_date);
                $task->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($task->end_date);
                $task->end_date = date('Y-m-d H:i', $strToTime);
            }

            foreach ($bids as $bid) {
                $strToTime = strToTime($bid->start_date);
                $bid->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($bid->end_date);
                $bid->end_date = date('Y-m-d H:i', $strToTime);
            }

            foreach ($selectedBids as $selectedBid) {
                $strToTime = strToTime($selectedBid->start_date);
                $selectedBid->start_date = date('Y-m-d H:i', $strToTime);
                $strToTime = strToTime($selectedBid->end_date);
                $selectedBid->end_date = date('Y-m-d H:i', $strToTime);
            }

            foreach ($completedBids as $completedBid) {
                $completedBid->start_date = date('Y-m-d H:i', strToTime($completedBid->start_date));
                $completedBid->end_date = date('Y-m-d H:i', strToTime($completedBid->end_date));
            }

            foreach ($tasksCompletedForYou as $taskCompletedForYou) {
                $taskCompletedForYou->start_date = date('Y-m-d H:i', strToTime($taskCompletedForYou->start_date));
                $taskCompletedForYou->end_date = date('Y-m-d H:i', strToTime($taskCompletedForYou->end_date));
            }
        }
        return view('home',
            compact('tasks', 'bids', 'selectedBids', 'numOpenBids', 'numTasks', 'numSelectedBids', 'completedBids',
                'numCompletedBids', 'tasksCompletedForYou', 'numTasksCompletedForYou', 'isCommonTasksCreator'));
    }
}
