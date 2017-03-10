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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Your Tasks</h3>
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
            @endif
        </div>
    </div>
@endsection
