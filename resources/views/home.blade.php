@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dashboard</h3>
                    </div>

                    <div class="panel-body">
                        Welcome to Taskr.
                    </div>
                </div>
            </div>
            @if(Auth::check())

            <!-- YOUR TASKS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Your Tasks
                            <a href="tasks/create" style="color:#3097D1; float:right">Create Task</a>
                        </h3>
                    </div>
                    @if (sizeOf($tasks)>0)
                    <table class="table">
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>End Date</th>
                        </tr>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->title}}</td>
                            <td>{{$task->category}}</td>
                            <td>{{$task->status}}</td>
                            <td>{{$task->end_date}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no tasks. Click
                        <a href="thisgoesnowhere">here</a>
                        to create a new task.
                    </div>
                    @endif
                </div>
            </div>

            <!-- YOUR BIDS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Your Bids
                            <a href="tasks" style="color:#3097D1; float:right">View Tasks</a>
                        </h3>
                    </div>
                    @if (sizeOf($bids)>0)
                    <table class="table">
                        <tr>
                            <th>Task ID</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Price</th>
                            <th>Selected</th>
                        </tr>
                        @foreach ($bids as $bid)
                        <tr>
                            <td>{{$bid->task_id}}</td>
                            <td>[TODO: get title of task]</td>
                            <td>[TODO: get owner of task]</td>
                            <td>{{$bid->price}}</td>
                            <td>{{$bid->selected}}</td>
                        @endforeach
                    </table>
                    @else
                    <div class="panel-body">
                        You currently have no bids. Click
                        <a href="tasks">here</a>
                        to view other people's tasks.
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
