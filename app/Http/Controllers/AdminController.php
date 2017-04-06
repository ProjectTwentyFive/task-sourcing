<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Repositories\Bids;
use Taskr\Repositories\Tasks;
use Taskr\Repositories\Users;

use Illuminate\support\Facades\DB;

/**
 * Class AdminController is used to handle logic for the admin dashboard.
 *
 * @package Taskr\Http\Controllers
 */
class AdminController extends Controller
{
    protected $tasksRepo, $bidsRepo, $usersRepo;

    public function __construct(Tasks $tasks, Bids $bids, Users $users)
    {
        $this->tasksRepo = $tasks;
        $this->bidsRepo = $bids;
        $this->usersRepo = $users;
    }

    /**
     * Show the administrative dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::User()->is_admin) {
            // Compute statistics and inject into view
            // Users Signed Up
            $usersCount = $this->usersRepo->getUsersCount();

            // Number of Bids
            $bidsCount = $this->bidsRepo->getBidsCount();

            // Task Completed Per Person
            $tasksCompletedPer = $this->tasksRepo->getCompletedTasksAverage();

            // Task Created Per Person
            $tasksCreatedPer = $this->tasksRepo->getCreatedTasksAverage();

            // Bids Per Task
            $bidsAverage = $this->bidsRepo->getTasksBidsAverage();

            // Unbidded Tasks
            $unbiddedTasksCount = $this->tasksRepo->getUnbiddedTasksCount();

            return view('admin', compact('usersCount', 'bidsCount', 'tasksCompletedPer',
                'tasksCreatedPer', 'bidsAverage', 'unbiddedTasksCount'));
        } else {
            abort(403);
        }
    }
}
