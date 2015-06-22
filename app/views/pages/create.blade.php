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
    <h1>Create Page</h1>
    {{ Form::open(['route' => 'pages.store', 'class' => 'ui form blue segment', 'files' => 'true']) }}
        <div class="field">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', '', ['class'=>'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('slug', 'URL Slug:') }}
            {{ Form::text('slug','',['class'=>'form-control']) }}
        </div>

        <div class="field">
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description', '', ['class'=>'form-control ckeditor','rows'=>4]) }}
        </div>

        <div class="field">
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content', '', ['class'=>'ckeditor ckeditor']) }}
        </div>
        {{ Form::submit('Submit', ['class' => 'ui blue button']) }}
    {{ Form::close() }}
</div>
@stop
