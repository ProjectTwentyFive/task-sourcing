<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="list-task">
                        <h3 class="list-generic-task-name">
                            {{ $genericTask->name }}
                        </h3>

                        <p class="list-generic-task-category"><b>Category:</b> {{ $genericTask->category }}</p>
                        <div class="btn-group">
                            <a class="btn btn-primary" href="/generic-tasks/{{ $genericTask->id }}/edit">Edit</a>
                        </div>

                        <div class="btn-group">
                            {{ Form::open(['method' => 'DELETE', 'route' => ['generic-task.destroy', $genericTask->id]]) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
