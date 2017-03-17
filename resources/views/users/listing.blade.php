<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="list-task">
                <h4 class="list-user-name"><a href="/users/{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</a></h4>
                <p class="list-user-meta">id: {{ $user->id }}</p>
                <p class="list-user-meta">email: {{ $user->email }}</p>
                <p class="list-user-meta">password: {{ $user->password }}</p>
                <p class="list-user-meta">admin: {{ $user->is_admin }}</p>
            </div>
        </div>
    </div>
</div>
