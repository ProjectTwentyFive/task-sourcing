@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Generic Tasks</h2>
                <a href="generic-tasks/create" style="color:#3097D1; float:right">New Generic Task</a>
            </div>
        </div>
        @if (sizeOf($genericTasks) > 0)
            @foreach ($genericTasks as $genericTask)
                @include('generic-tasks.listing')
            @endforeach
        @else
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <p>No Generic Tasks</p>
                </div>
            </div>
        @endif 
    </div>
@endsection
