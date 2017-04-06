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
            return DB::select('select * from bids b, users u where b.task_id = ? and b.user_id = ? and u.id = b.user_id',
                [$task->id, $user_id]);
        } else {
            return DB::select('select * from bids b, users u where b.task_id = ? and b.user_id = u.id', [$task->id]);
        }
    }


    /**
     * Update the selected field of the bid, whether is it true or false.
     *
     * @param task_id
     * @param $bid_id
     * @param $is_selected
     *
     * @internal param $id
     * @return void
     */
    public function update($task_id, $bid_id, $is_selected)
    {
        DB::update('UPDATE bids SET selected = ? WHERE id = ?', [$is_selected, $bid_id]);
        // update the task status
        $status = ($is_selected == 'true') ? 1 : 0;

        return redirect()->action('Resources\TasksController@updateStatus', ['id' => $task_id, 'status' => $status]);
    }

    /**
     * This method must be restricted to administrator access as user should not be allowed to delete a bid.
     *
     * @param $id
     *
     * @return void
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
