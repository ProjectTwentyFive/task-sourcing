@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-users fa-fw" aria-hidden="true"></i> &nbsp;Application Users</h3>
            </div>
        </div>

        @foreach ($users as $user)
            @include('users.listing')
        @endforeach
    </div>
@endsection

