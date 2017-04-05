<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-task-title"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h4>
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
    <hr>
</div>
