@extends ('layouts.app')

@section ('content')
    <div class="container">
        @foreach ($users as $user)
          @include('users.listing')
        @endforeach
    </div>
@endsection
