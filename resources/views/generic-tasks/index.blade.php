@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="pull-left"><i class="fa fa-terminal fa-fw" aria-hidden="true"></i> Generic Tasks</h3>
                <a class="btn btn-primary btn-sm pull-right h3" href="generic-tasks/create">
                    <i class="fa fa-plus fa-fw" aria-hidden="true"></i> &nbsp;Create Generic Task
                </a>
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
