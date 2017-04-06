<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel {{$user->is_admin ? 'panel-danger' : 'panel-default'}}">
            <div class="panel-heading ">
                <h3 class="panel-title">
                    {{ $user->first_name }} {{ $user->last_name }}
                </h3></div>
            <div class="panel-body">
                <p class="list-user-meta">id: {{ $user->id }}</p>
                <p class="list-user-meta">email: {{ $user->email }}</p>
                <p class="list-user-meta">password: {{ $user->password }}</p>
                <p class="list-user-meta">admin: {{ $user->is_admin ? 'true' : 'false' }}</p>

                <div class="btn-toolbar">
                    <div class="btn-group">
                        {{ Form::open(['method' => 'GET', 'route' => ['user.edit', $user->id]]) }}
                        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                        {{ Form::close() }}
                    </div>

                    <div class="btn-group">
                        {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
