<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading "><h3 class="panel-title"><b>{{ $task->title }}</b></h3></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="list-task-meta"><b>Owner:</b> {{$task->first_name}} {{$task->last_name}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="list-task-start_time"><b>Start Time:</b> {{ $task->start_date }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p class="list-task-category"><b>Category:</b> {{ $task->category }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="list-task-end_time"><b>End Time:</b> {{ $task->end_date }}</p>
                    </div>
                </div>
                <p><b>Description:</b> {{ $task->description }}</p>

                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a class="btn btn-success" href="tasks/{{ $task->id }}">View Details</a>
                    </div>
                    @if (Auth::check() && ($user->is_admin || $user->id == $task->owner))
                        <div class="btn-group">
                            <a class="btn btn-primary" href="tasks/{{ $task->id }}/edit">Edit</a>
                        </div>

                        <div class="btn-group">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
