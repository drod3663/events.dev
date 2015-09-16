@extends('layouts.master')


@section('content')


	{{ Form::token() }}
	{{ Form::open(array('action' => array('HomeController@doLogin'))) }}
        
   

<div class="form-group @if($errors->has('email')) has-error @endif">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('password')) has-error @endif">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', null, ['class' => 'form-control']) }}
</div>

<button class="btn btn-primary">Submit</button>
 	{{ Form::close() }}



@stop 