@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp;Create User</h3>
                <form method="POST" action="{{route('user.store')}}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">First Name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name"
                               value="{{ old('first_name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label for="last_name">Last Name</label>

                        <input id="last_name" type="text" class="form-control" name="last_name"
                               value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email Address</label>

                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>

                        <input id="password_confirmation" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <label for="is_admin">Is Admin?</label>
                        <select class="form-control" id="is_admin" name="is_admin">
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
