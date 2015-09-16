
<div class="form-group @if($errors->has('start_time')) has-error @endif">
    {{ Form::label('start time', 'Start Time') }}
    {{ Form::text('start time', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('end_time')) has-error @endif">
    {{ Form::label('end time', 'End Time') }}
    {{ Form::text('end time', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('title')) has-error @endif">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('location')) has-error @endif">
    {{ Form::label('location', 'Location') }}
    {{ Form::text('location', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('description')) has-error @endif">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group @if($errors->has('price')) has-error @endif">
    {{ Form::label('price', 'price') }}
    {{ Form::text('price', null, ['class' => 'form-control']) }}
</div>

<button class="btn btn-primary">Save</button>