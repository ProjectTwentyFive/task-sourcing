<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-task-title"><a href="/tasks/{{ $task->id }}">{{ $task->title }}</a></h4>
                <p class="list-task-meta"><b>Created At:</b> {{ $task->created_at }}</p>
                <p class="list-task-category"><b>Category:</b> {{ $task->category }}</p>
                <p><b>Description:</b> {{ $task->description }}</p>
                <a class="btn btn-primary" href="/tasks/{{ $task->id }}/edit">Edit</a>
                {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <hr>
</div>
