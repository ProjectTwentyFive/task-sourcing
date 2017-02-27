<?php

namespace Taskr\Http\Controllers;

use Illuminate\Http\Request;

use Taskr\Task;
use Taskr\Bid;

class BidsController extends Controller
{
    public function store(Task $task) {
        $task->addBid(request('price'));
        return back();
    }
}
