@extends ('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-user">
                <h4 class="list-user-title"><a href="/users/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></h4>
                <p class="list-user-meta">id: {{ $user->id }}</p>
                <p class="list-user-meta">email: {{ $user->email }}</p>
                <p class="list-user-meta">password: {{ $user->password }}</p>
                <p class="list-user-meta">admin: {{ $user->is_admin }}</p>

                {{ Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
