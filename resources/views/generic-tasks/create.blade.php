@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1> Create New Generic Task</h1>
                <form method="POST" action="/generic-tasks">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Task Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                           placeholder="Building a cupboard" aria-label="...">
                    </div>
                    <div class="form-group">
                        <label for="title">Task Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                               placeholder="Craftsmanship">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
