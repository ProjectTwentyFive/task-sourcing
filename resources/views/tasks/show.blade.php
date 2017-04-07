@extends ('layouts.app')

@section('content')
<div class="container">

    <!-- status bar -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if ($task->status == 2)
                <div class="alert alert-success" role="alert">This task has been marked as completed by the owner.</div>
            @elseif ($task->status == 1)
                <div class="alert alert-warning" role="alert">Bidding is no longer opened for this task because a bidder has been selected by the owner.</div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h3>{{ $task->title }}</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <p><b>Owner: </b> {{$taskOwner->first_name}} {{$taskOwner->last_name}}</p>
                    <p><b>Created at:</b> {{ $task->created_at }}</p>
                    <p><b>Category:</b> {{ $task->category }}</p>
                    <p><b>Start Time:</b> {{ $task->start_date }}</p>
                    <p><b>End Time:</b> {{ $task->end_date }}</p>
                    <p><b>Description:</b> {{ $task->description }}</p>
                </div>
            </div>

        </div>
    </div>

    @if ($task->status >= 0 && $task->status <=2)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3><i class="fa fa-gavel" aria-hidden="true"></i>&nbsp; {{ $numBids }}
                @if ($numBids == 1)
                    Bid
                @else
                    Bids
                @endif
                </h3>
                <div class="bids">
                    <ul class="list-group">
                        @if(sizeOf($bids) <= 0)
                            <li class="list-group-item clearfix">
                                There are currently no bids for this task.
                            </li>
                        @else
                        @foreach($bids as $bid)
                            @if ($task->status == 0 || $bid->selected == 'true')
                                <li class="list-group-item clearfix">
                                    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $bid->created_at)->diffForHumans()}}:&nbsp;
                                    <strong>{{$bid->first_name}} {{$bid->last_name}}</strong> bid <strong>${{ $bid->price }}</strong>&nbsp;
                                    @if ($bid->selected == 'true')
                                        <span class="label label-success">Winning Bid</span>
                                    @endif

                                    <span class="pull-right">
                                    @if (Auth::check() && ($user->is_admin || $user->id == $task->owner) &&  $task->status != 2)
                                        @if ($bid->selected)
                                            {{ Form::open(['method' => 'POST', 'route' => ['bid.update', $task->id, $bid->id, 'false']]) }}
                                                {{ Form::submit('Unselect', ['class' => 'btn btn-warning']) }}
                                            {{ Form::close() }}
                                        @else
                                            {{ Form::open(['method' => 'POST', 'route' => ['bid.update', $task->id, $bid->id, 'true']]) }}
                                                {{ Form::submit('Select', ['class' => 'btn btn-success']) }}
                                            {{ Form::close() }}
                                        @endif
                                    @endif

                                    @if (Auth::check() && ($user->is_admin || ($user->id == $bid->user_id && $task->status == 0)))
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['bid.destroy', $bid->id]]) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                    @endif
                                    </span>
                                </li>
                            @endif
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

         @if (Auth::check() && ($user->is_admin || ($user->id != $task->owner && $task->status == 0)))
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-block">
                            <p>Make a bid</p>
                            <form method="POST" action="/tasks/{{$task->id}}/bids" data-toggle="validator">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="number" id="price" name="price" class="form-control" placeholder="Price" required step="0.01" min="0.01">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Bid</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- action buttons -->
        @if (Auth::check() && ($user->is_admin || ($user->id == $task->owner)))
        </br>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="btn-toolbar">
                <!-- edit and delete button -->
                @if (Auth::check() && ($user->is_admin || $user->id == $task->owner) && $task->status != 2)
                    <div class="btn-group"><a class="btn btn-primary" href="/tasks/{{ $task->id }}/edit">Edit</a></div>
                    <div class="btn-group">
                        {{ Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]) }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                @endif

                <!-- complete button -->
                <div class="btn-group">
                    @if ($task->status != 2)
                        {{ Form::open(['method' => 'GET', 'route' => ['tasks.updateStatus', $task->id, 2]]) }}
                            {{ Form::submit('Mark Task Completed', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    @endif
                </div>
            </div>
            </div>
        </div>
        @endif
    @endif

</div>
@endsection
