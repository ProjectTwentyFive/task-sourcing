@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-user" aria-hidden="true"></i> &nbsp; Edit User</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="/users/{{$user->id}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{$user->first_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{$user->last_name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Change Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label for="is_admin">Is Admin?</label>
                        <select class="form-control" id="is_admin" name="is_admin">
                            <option value="true" {{$user->is_admin ? 'selected' : ''}}>Yes</option>
                            <option value="false" {{!$user->is_admin ? 'selected' : ''}}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit</button>
                    <a class="btn btn-default" href="{{ route('users.index') }}">Cancel</a>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
