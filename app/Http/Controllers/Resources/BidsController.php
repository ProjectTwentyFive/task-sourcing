<?php

namespace Taskr\Http\Controllers\Resources;

use Taskr\Bid;
use Taskr\Http\Controllers\Controller;
use Taskr\Task;

/**
 * Class BidsController
 *
 * @package Taskr\Http\Controllers\Resources
 */
class BidsController extends Controller
{
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

    }

    public function show(Bid $bid)
    {

    }

    public function create()
    {

    }

    public function edit()
    {

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
    public function update()
    {

    }

    public function delete()
    {

    }

    public function store(Task $task)
    {
        $task->addBid(request('price'));
        return back();
    }
}
