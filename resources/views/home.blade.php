<!--
@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Dashboard</h3>

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
                    
         					 <form action="tasks/search" method="GET" role="search" name="myform">
                              
                             

                                 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                        placeholder="Search users">

                                        <input type="submit" value="Search" name="submit" class="btn btn-default">

                                        
                                        
                                   
                                </div>

                           

                         
                           </form>

                    <table class="table table-hover">
                        <tr>
                      
                       
                        </tr>
                        <tr>
                            @foreach ($tasks as $key=> $task)
                            <div>
                                 <a href = "tasks">{{$task->title}}</a>
                    </tr>
                            @endforeach
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Status</th>
                            <th>Max Bid </th>
                            <th>Total Bids </th>
                            <th><!-- edit button placeholder--></th>
                        </tr>
                        @foreach ($tasks as $task)
                        <tr onclick="window.document.location='tasks/{{$task->id}}';">
                            <td>{{$task->title}}</td>
                            <td>{{$task->category}}</td>
                            <td>{{$task->start_date}}</td>
                            <td>{{$task->end_date}}</td>
                            <td>
                                @php
                                    switch($task->status) {
                                        case 0:
                                            print("opened");
                                            break;
                                        case 1:
                                            print("closed");
                                            break;
                                        case 2:
                                            print("completed");
                                            break;
                                        default:
                                            break;
                                    }
                                @endphp
                            </td>
                            <td>{{ $maxprice }} </td>

                            <td> {{ $countbids }} </td>
                            <td>
                                <a href="tasks/{{$task->id}}/edit" class="btn btn-primary">Edit</a>
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
                        <h3 class="panel-title">
                            Your Pending Bids
                            <a href="tasks" style="color:#3097D1; float:right">View Tasks</a>
                        </h3>
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
                        to find tasks to complete.
                    </div>
                    @endif
                </div>
            </div>

            <!-- YOUR ASSIGNED TASKS PANEL -->
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Your Assigned Tasks
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
                            Your Completed Assigned Tasks
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
                </div>
            </div>

            @endif
        </div>
    </div>
@endsection
-->
<p> Home Page </p>
