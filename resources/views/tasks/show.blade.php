@extends ('layouts.app')

@section('content')

    <!-- status bar -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($task->status == 2)
                <div class="alert alert-success" role="alert">This task has been marked as complete by the owner.</div>
            @elseif ($task->status == 1)
                <div class="alert alert-warning" role="alert">Bidding is no longer opened for this task because a bidder has been selected by the owner.</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-task-title">{{ $task->title }}</h4>
                <p class="list-task-meta"><b>Status:</b>
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
                </p>
                <p class="list-task-meta"><b>Created at:</b> {{ $task->created_at }}</p>
                <p class="list-task-category"><b>Category:</b> {{ $task->category }}</p>
                <p class="list-task-start_time"><b>Start Time:</b> {{ $task->start_date }}</p>
                <p class="list-task-end_time"><b>End Time:</b> {{ $task->end_date }}</p>
                <p><b>Description:</b> {{ $task->description }}</p>
                @if (Auth::check() && ($user->is_admin || $user->id == $task->owner))
                    <a class="btn btn-primary" href="/tasks/{{ $task->id }}/edit">Edit</a>
                    {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>

    @if ($task->status != 2)
        <hr>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="bids">
                    <ul class="list-group">
                        @foreach($task->bids as $bid)
                            @if ($task->status == 0 || $bid->selected == 'true')
                                @if ($bid->selected == 'true')
                                <strong>Winning Bid</strong>
                                @endif
                                <li class="list-group-item">
                                    <strong>
                                        {{ $bid->created_at->diffForHumans() }}: &nbsp;
                                    </strong>
                                    {{$bid->user_id}} ${{ $bid->price }}

                                    @if (Auth::check() && ($user->is_admin || $user->id == $task->owner))
                                        @if ($bid->selected)
                                            {{ Form::open(['method' => 'POST', 'route' => ['bid.update', $task->id, $bid->id, 'false']]) }}
                                                {{ Form::submit('Unselect', ['class' => 'btn btn-warning']) }}
                                            {{ Form::close() }}
                                        @else
                                            {{ Form::open(['method' => 'POST', 'route' => ['bid.update', $task->id, $bid->id, 'true']]) }}
                                                {{ Form::submit('Select', ['class' => 'btn btn-success']) }}
                                            {{ Form::close() }}
                                        @endif
                                    @endif

                                    @if (Auth::check() && ($user->is_admin || ($user->id == $bid->user_id && $task->status == 0)))
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['bid.destroy', $bid->id]]) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

         @if (Auth::check() && ($user->is_admin || ($user->id != $task->owner && $task->status == 0)))
            <hr>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-block">
                            <p>Make a bid</p>
                            <form method="POST" action="/tasks/{{$task->id}}/bids">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- complete button -->
        @if (Auth::check() && ($user->is_admin || ($user->id == $task->owner)))
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if ($task->status != 2)
                    {{ Form::open(['method' => 'GET', 'route' => ['tasks.updateStatus', $task->id, 2]]) }}
                        {{ Form::submit('Complete Task', ['class' => 'btn btn-success']) }}
                    {{ Form::close() }}
                @endif
            </div>
        </div>
        @endif
    @endif

@endsection
