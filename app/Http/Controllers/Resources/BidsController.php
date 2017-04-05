<?php

namespace Taskr\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Taskr\Bid;
use Taskr\Http\Controllers\Controller;
use Taskr\Repositories\Bids;
use Taskr\Task;
use Auth;
use DB;

/**
 * Class BidsController
 *
 * @package Taskr\Http\Controllers\Resources
 */
class BidsController extends Controller
{
    protected $bidsRepo;

    public function __construct(Bids $bids)
    {
        $this->bidsRepo = $bids;
    }

    /*
    |--------------------------------------------------------------------------
    | View Methods
    |--------------------------------------------------------------------------
    |
    | These methods should return views with the appropriate data bind to it.
    |
    */

    /**
     * Display a listing of the bid such as the bid details (date, cost, etc).
     *
     * @param \Taskr\Bid $bid
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Bid $bid)
    {
        return view("bids.show");
    }

    /**
     * Display a form to create a new bid. If this is not needed in finalized design decision, restrict this
     * method to administrators only.
     *
     ** @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("bids.create");
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

    /**
     * Return all the bids from a task. Accept some parameters to filter the bids.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Taskr\Task              $task
     */
    public function index(Request $request, Task $task)
    {
        # if request query has user, add user id into the filter of the request
        if ($request->has('user')) {
            $user_id = $request->input('user')->id;
            return DB::select('select * from bids b, users u where b.task_id = ? and b.user_id = ? and u.id = b.user_id', [$task->id, $user_id]);
        } else {
            return DB::select('select * from bids b, users u where b.task_id = ? and b.user_id = u.id', [$task->id]);
        }
    }


    /**
     * Update the selected field of the bid, whether is it true or false.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Taskr\Bid               $bid
     *
     * @internal param $id
     */
    public function update($task_id, $bid_id, $isSelected)
    {
        DB::update('UPDATE bids SET selected = ? WHERE id = ?', [$isSelected, $bid_id]);
        // update the task status
        $status = ($isSelected == 'true') ? 1: 0;

        return redirect()->action('Resources\TasksController@updateStatus', ['id' => $task_id, 'status' => $status]);
    }

    /**
     * This method must be restricted to administrator access as user should not be allowed to delete a bid.
     *
     * @param \Taskr\Bid $bid
     */
    public function destroy($id)
    {
        $this->bidsRepo->deleteBid($id);
        return back();
    }

    /**
     * @param \Taskr\Task $task
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Task $task)
    {
        $this->bidsRepo->insertBid($task->id, Auth::id(), request('price'));
        return back();
    }
}
