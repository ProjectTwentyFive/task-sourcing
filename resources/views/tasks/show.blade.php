@extends ('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-task-title">{{ $task->title }}</h4>
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

    @if (Auth::check() && ($user->is_admin || $user->id != $task->owner))
    <hr>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="bids">
                <ul class="list-group">
                    @foreach($task->bids as $bid)
                        <li class="list-group-item">
                            <strong>
                                {{ $bid->created_at->diffForHumans() }}: &nbsp;
                            </strong>
                            {{$bid->user_id}} ${{ $bid->price }}

                            @if (Auth::check() && ($user->is_admin || $user->id == $bid->user_id))
                            {{ Form::open(['method' => 'DELETE', 'route' => ['bid.destroy', $bid->id]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-block">
                    <form method="POST" action="/tasks/{{$task->id}}/bids">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" id="price" name="price" class="form-control" placeholder="Make a bid">
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
@endsection
