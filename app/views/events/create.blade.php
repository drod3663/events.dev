@extends('layouts.master')

<div class="col-md-8">
@section('content')

	{{ Form::token() }}
	{{ Form::open(array('action' => array('CalendarEventsController@store'))) }}
		@include('events.create-edit-form')
	{{ Form::close() }}

	{{Form::open(array('action'=>'CalendarEventsController@store', 'method' => 'POST', 'id' => 'create-post-form', 'files' =>true))}}
	{{Form::label('Add Picture', 'Add Picture')}}
	{{Form::file('image')}}
	{{Form::close()}}

</div>
@stop