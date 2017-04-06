@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Edit Generic Task</h1>
                <form method="POST" action="/generic-tasks/{{ $genericTask->id }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label for="name">Task Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Building a cupboard" aria-label="..." value="{{ $genericTask->name }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Task Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                               placeholder="Craftsmanship" value="{{ $genericTask->category }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
