@extends('layouts.default')

@section('alerts')
@parent

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
@stop

@section('main')
<div class="container">
	<div class="ui basic segment pagehead">
	    <h1 class="ui header">
			<i class="icon setting"></i> Settings
		</h1>
	</div>
    {{ Form::open(['route' => 'settings.store', 'class' => 'ui form blue segment']) }}
        <div class="field">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name','',['class'=>'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug','',['class'=>'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('value', 'Value') }}
            {{ Form::textarea('value','',['class'=>'form-control ckeditor', 'rows'=>4]) }}
        </div>
        {{ Form::submit('Submit', ['class' => 'ui blue button']) }}
    {{ Form::close() }}
</div>
@stop
