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
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Common Task <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach($generic_tasks as $generic_task)
                                        <li onclick="selectTask('{{ $generic_task->name }}', '{{ $generic_task->category }}')">
                                            <a>{{ $generic_task->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="text" class="form-control" id="title" name="title"
                               placeholder="Building a cupboard" aria-label="...">
                        </div>
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

                    <div class="form-group{{ $errors->has('start_date') ? 'has-error' : '' }}">
                        <label for="title">Start Date</label>
                        <Input type="text" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD HH:mm">
                    </div>

                    <div class="form-group{{ $errors->has('end_date') ? 'has-error' : '' }}">
                        <label for="title">End Date</label>
                        <Input type="text" class="form-control" id="end_date" name="end_date" placeholder="YYYY-MM-DD HH:mm">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection
