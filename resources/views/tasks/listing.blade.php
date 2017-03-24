<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-task-title"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h4>
                <p class="list-task-meta">{{ $task->created_at }}</p>
                <p class="list-task-category">{{ $task->category }}</p>
                <p>{{ $task->description }}</p>

                @if (Auth::check() && ($user->is_admin || $user->id == $task->owner))
                {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
                @endif
            </div>
        </div>
    </div>
</div>
