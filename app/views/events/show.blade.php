@extends('layouts.master')

<div class="col-md-8">
@section('content')
	
	<h1> {{{$event->title}}}</h1>
	
	<p>{{{$event->description}}}</p>
	<h4>{{{$event->start_time}}} - {{{$event->end_time}}}</h4>
	<h4>${{{$event->price}}}</h4>
	<p><em> {{"created by: " . $event->user->first_name }} {{$event->user->last_name}}</em></p>
	<h5> {{ $event->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }} </h5>
		
	@if(Auth::check())
		<div class="row">
		<div clas="col-md-6">
			<a class="btn btn-primary" href="{{action('CalendarEventsController@edit', $event->id)}}">Edit</a>
			<button id="delete" class="btn btn-danger">Delete</button>
			<a class="btn btn-primary" href="{{action('HomeController@showRegister')}}">Register For Event</a>
	@endif
		</div>
		</div>
		
	{{Form::open(array('action' =>array('CalendarEventsController@destroy', $event->id), 'method' => 'DELETE', 'id' => 'formDelete'))}}
	{{Form::close()}}
@stop

</div>

@section('script')
	<script>
	(function(){
	"use strict";
	$('#delete').on('click', function(){
		var onConfirm = confirm('Are you sure?');
		if(onConfirm){
			$('#formDelete').submit();
		}
	});
	})();
	</script>
@stop