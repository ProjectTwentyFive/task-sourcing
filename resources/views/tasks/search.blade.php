@extends('layouts.app')


@section('content')

<div class="container">
	@if(count($details) > 0)
		<p> The Search results for your query <b> {{ $query }} </b> are :</p>
	    <h2>Task details</h2>
	    <table class="table table-striped">
	        <thead>
	            <tr>
	                <th>Title</th>
	                <th>Created_at</th>
	                <th>Category</th>
	                <th>Start_Date</th>
	                <th>End_Date</th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach($details as $task)
	            <tr>
	                <td>{{$task->title}}</td>
	                <td>{{$task->created_at}}</td>
	                <td>{{$task->category}}</td>
	                <td>{{$task->start_date}}</td>
	                <td>{{$task->end_date}}</td>
	            </tr>
	            @endforeach
	        </tbody>
	    </table>
	@else
		No results found
	@endif
</div>



@endsection