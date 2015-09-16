@extends('layouts.master')

	
@section('content')


<h1>{{ $event->title }}</h1>
	{{ Form::token() }}
    {{ Form::model($event, array('action' => array('CalendarEventsController@update', $event->id), 'method' => 'PUT')) }}
        @include('events.create-edit-form')
    {{ Form::close() }}

{{ $errors->first('title', '<span class="bg-primary">Please include all fields</span>') }}


@stop