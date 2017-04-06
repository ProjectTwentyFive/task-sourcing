@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h3><i class="fa fa-id-badge fa-fw" aria-hidden="true"></i> &nbsp;Admin Dashboard</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-line-chart" aria-hidden="true"></i> &nbsp;Statistics
                            </h3>
                        </div>
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-globe" aria-hidden="true"></i> &nbsp;Quick Navigation
                            </h3>
                        </div>
                        <div class="panel-body" align="center">
                            <a class="btn btn-success" href="{{route('users.index')}}">
                                <i class="fa fa-users fa-fw" aria-hidden="true"></i> &nbsp;Users
                            </a>

                            <a class="btn btn-danger" href="{{route('user.create')}}">
                                <i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i> &nbsp;Create User
                            </a>

                            <a class="btn btn-primary" href="{{route('tasks.index')}}">
                                <i class="fa fa-tasks fa-fw" aria-hidden="true"></i> &nbsp;Tasks
                            </a>

                            <a class="btn btn-warning" href="{{route('task.create')}}">
                                <i class="fa fa-tasks fa-fw" aria-hidden="true"></i> &nbsp;Create Task
                            </a>

                            <a class="btn btn-info" href="{{route('generic-tasks')}}">
                                <i class="fa fa-tasks fa-fw" aria-hidden="true"></i> &nbsp;Generic Tasks
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
