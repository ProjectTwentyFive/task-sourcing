<?php

namespace Taskr\Http\Controllers;

use Auth;
use Taskr\Repositories\Bids;
use Taskr\Repositories\Tasks;

/**
 * Class AdminController is used to handle logic for the admin dashboard.
 *
 * @package Taskr\Http\Controllers
 */
class AdminController extends Controller
{
    protected $tasksRepo, $bidsRepo;

    public function __construct(Tasks $tasks, Bids $bids)
    {
        $this->tasksRepo = $tasks;
        $this->bidsRepo = $bids;
    }

    /**
     * Show the administrative dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && $this->isAdmin()) {
            return view('admin');
        } else {
            abort(403);
        }
    }
}
