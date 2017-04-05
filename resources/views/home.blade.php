@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i> &nbsp;Dashboard</h3>
            </div>
        </div>

        <div class="row">

            <!-- YOUR TASKS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: normal;
                                   width: 75%; padding-top: 6px;" class="panel-title pull-left">
                            <i class="fa fa-rocket" aria-hidden="true"></i> &nbsp;Your Created Tasks <b>({{ $numTasks }})</b>
                        </h3>
                        <a class="btn btn-primary btn-sm pull-right" href="{{route('task.create')}}">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i> &nbsp;Create Task
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    @if (sizeOf($tasks)>0)
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Bids</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($tasks as $task)
                        <tr onclick="window.document.location='tasks/{{$task->id}}';">
                            <td>{{$task->title}}</td>
                            <td>{{$task->category}}</td>
                            <td>{{$task->start_date}}</td>
                            <td>{{$task->end_date}}</td>
                            <td>{{$task->total_bids}}
                            @if($task->new_bids > 0)
                            <span class="label label-danger">{{$task->new_bids}} new</span>
                            @endif
                            </td>
                            <td>
                                @php
                                    switch($task->status) {
                                        case 0:
                                            print("Opened");
                                            break;
                                        case 1:
                                            print("Closed");
                                            break;
                                        case 2:
                                            print("Completed");
                                            break;
                                        default:
                                            break;
                                    }
                                @endphp
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no tasks. Click
                        <a href="tasks/create">here</a>
                        to create a new task.
                    </div>
                    @endif
                </div>
            </div>

            <!-- YOUR PENDING BIDS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: normal;
                                   width: 75%; padding-top: 6px;" class="panel-title pull-left">
                            <i class="fa fa-pause" aria-hidden="true"></i> &nbsp;Your Pending Bids <b>({{ $numOpenBids }})</b>
                        </h3>
                        <a class="btn btn-success btn-sm pull-right" href="{{route('tasks.index')}}">
                            <i class="fa fa-search fa-fw" aria-hidden="true"></i> &nbsp;View Tasks
                        </a>
                        <div class="clearfix"></div>
                    </div>
                    @if (sizeOf($bids)>0)
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Price</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                        @foreach ($bids as $bid)
                        <tr onclick="window.document.location='tasks/{{$bid->task_id}}';">
                            <td>{{$bid->title}}</td>
                            <td>{{$bid->first_name}} {{$bid->last_name}}</td>
                            <td>{{$bid->price}}</td>
                            <td>{{$bid->start_date}}</td>
                            <td>{{$bid->end_date}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no pending bids. Click
                        <a href="tasks">here</a>
                        to find tasks to bid on.
                    </div>
                    @endif
                </div>
            </div>

            <!-- YOUR ASSIGNED TASKS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-play" aria-hidden="true"></i> &nbsp;Your Assigned Tasks <b>({{$numSelectedBids}})</b>
                        </h3>
                    </div>
                    @if (sizeOf($selectedBids)>0)
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Price</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                        @foreach ($selectedBids as $selectedBid)
                        @if($selectedBid->status == 1)
                        <tr onclick="window.document.location='tasks/{{$selectedBid->task_id}}';">
                            <td>{{$selectedBid->title}}</td>
                            <td>{{$selectedBid->first_name}} {{$selectedBid->last_name}}</td>
                            <td>{{$selectedBid->price}}</td>
                            <td>{{$selectedBid->start_date}}</td>
                            <td>{{$selectedBid->end_date}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no assigned tasks. Click
                        <a href="tasks">here</a>
                        to find tasks to complete.
                    </div>
                    @endif
                </div>
            </div>

            <!-- YOUR ASSIGNED COMPLETED TASKS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> &nbsp;Your Completed Assigned Tasks
                        </h3>
                    </div>
                    @if (sizeOf($selectedBids)>0)
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Price</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                        @foreach ($selectedBids as $selectedBid)
                        @if($selectedBid->status == 2)
                        <tr onclick="window.document.location='tasks/{{$selectedBid->task_id}}';">
                            <td>{{$selectedBid->title}}</td>
                            <td>{{$selectedBid->first_name}} {{$selectedBid->last_name}}</td>
                            <td>{{$selectedBid->price}}</td>
                            <td>{{$selectedBid->start_date}}</td>
                            <td>{{$selectedBid->end_date}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no completed assigned tasks. Click
                        <a href="tasks">here</a>
                        to find tasks to complete.
                    </div>
                    @endif
                    <!-- hacked up solution for when assigned tasks > 0, but completed tasks <= 0 -->
                     @php
                        $countCompleted = 0;
                        foreach($selectedBids as $selectedBid) {
                            if ($selectedBid->status == 2) {
                                $countCompleted++;
                            }
                        }
                        if ($countCompleted <= 0 && sizeOf($selectedBids) > 0) {
                            echo '<div class="panel-body">
                                You currently have no completed assigned tasks. Click
                                <a href="tasks">here</a>
                                to find tasks to complete.
                            </div>';
                        }
                    @endphp
                </div>
            </div>

            @endif
        </div>

        <!-- Achievements Panel -->
        @if(Auth::check())
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-trophy fa-fw" aria-hidden="true"></i> &nbsp;Achievements</h3>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <!-- Achievement: Create a task -->
                        @if (sizeOf($tasks)>0)
                        <p style="color:green;">
                        @else
                        <p style="color:lightgrey;">
                        @endif
                            <i class="fa fa-edit fa-3x" aria-hidden="true"></i>
                            <span style="vertical-align:10px">
                                &nbsp;&nbsp;&nbsp;Task Creator: create a task to unlock this achievement
                            </span>
                        </p>

                        <!-- Achievement: Complete a task -->
                        @php
                            $countCompleted = 0;
                            foreach($selectedBids as $selectedBid) {
                                if ($selectedBid->status == 2) {
                                    $countCompleted++;
                                }
                            }
                            if ($countCompleted > 0) {
                                echo '<p style="color:green">';
                            } else {
                                echo '<p style="color:lightgrey">';
                            }
                        @endphp
                            <i class="fa fa-check-circle-o fa-3x" aria-hidden="true"></i>
                            <span style="vertical-align:10px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Task Completer: complete a task to unlock this achievement
                            </span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        @endif

    </div>
@endsection
