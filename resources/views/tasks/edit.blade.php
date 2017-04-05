@extends ('layouts.app')

@section('css')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-pencil" aria-hidden="true"></i> &nbsp;Edit Task</h3>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="patch">
                    <div class="form-group">
                        <label for="title">Task Title</label>
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Select Common Task <span
                                            class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @foreach($generic_tasks as $generic_task)
                                        <li onclick="selectTask('{{ $generic_task->name }}', '{{ $generic_task->category }}')">
                                            <a>{{ $generic_task->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <input type="text" class="form-control" id="title" name="title"
                                   placeholder="Building a cupboard" aria-label="..." value="{{ $task->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="body">Task Description</label>
                        <textarea class="form-control" id="description" name="description"
                                  rows="3">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">Task Category</label>
                        <input type="text" class="form-control" id="category" name="category"
                               placeholder="Craftsmanship" value="{{ $task->category }}">
                    </div>
                    <div class="form-group{{ $errors->has('start_date') ? 'has-error' : '' }}">
                        <label for="title">Start Date</label>
                        <Input type="text" class="form-control" id="start_date" name="start_date"
                               placeholder="YYYY-MM-DD HH:mm" value="{{ $task->start_date }}">
                    </div>

                    <div class="form-group{{ $errors->has('end_date') ? 'has-error' : '' }}">
                        <label for="title">End Date</label>
                        <Input type="text" class="form-control" id="end_date" name="end_date"
                               value="{{ $task->end_date }}" placeholder="YYYY-MM-DD HH:mm">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    @include('layouts.errors')
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $('#start_date').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });
            $('#end_date').datetimepicker({
                useCurrent: false,
                format: 'YYYY-MM-DD HH:mm'
            });
            $("#start_date").on("dp.change", function (e) {
                $('#end_date').data("DateTimePicker").minDate(e.date);
            });
            $("#end_date").on("dp.change", function (e) {
                $('#start_date').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
@endsection
