@extends ('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('register')}}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>

                            <div class="form-group">
                                <label for="name">Email:</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="name">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="name">Confirm Password:</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                       name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>

                            @include ('layouts.errors')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
