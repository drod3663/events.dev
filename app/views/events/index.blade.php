@extends('layouts.master')

@section('content')



<form>
	<div class="form-group @if($errors->has('title')) has-error @endif">
    	{{ Form::label('search events', 'Search Events') }}
    	{{ Form::text('search', null, ['class' => 'form-control']) }}
	</div>
</form>

@foreach ($events as $event)

    <h2><a href="{{{ action('CalendarEventsController@show', $event->id) }}}">{{{$event->title}}}</a></h2>
    
    {{{Str::words($event->description, 20)}}}
	<h4>{{$event->start_time}} - {{$event->end_time}}</h4>
	<h4>${{$event->price}}</h4>
    <p><em> {{"created by: " . $event->user->first_name }} {{$event->user->last_name}}</em></p>
    <h5> {{ $event->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A'); }} </h5>
@endforeach

{{ $events->links() }}


@stop

