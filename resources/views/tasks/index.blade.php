@extends ('layouts.app')

@section ('content')
    <div class="container">
        @foreach ($tasks as $task)
            @include('tasks.listing')
        @endforeach
    </div>
@endsection
