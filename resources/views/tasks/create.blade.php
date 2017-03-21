@extends ('layouts.app')

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1> Publish New Task</h1>
                <form method="POST" action="/tasks">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <input type="text" class="form-control" id="title" name="title" list="generic_tasks"
                               placeholder="Building a cupboard" onchange="fillCategory(value)">
                        <datalist id="generic_tasks">
                            @foreach($generic_tasks as $task)
                                <option id="{{ $task->name }}" value="{{ $task->name }}" category="{{ $task->category }}">
                            @endforeach
                        </datalist>
                    </div>
                    <div class="form-group">
                        <label for="body">Task Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
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
