@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-paint-brush" aria-hidden="true"></i> &nbsp;Available Tasks</h3>
            </div>
        </div>

        @foreach ($tasks as $task)
            @include('tasks.listing')
        @endforeach
    </div>
@endsection
