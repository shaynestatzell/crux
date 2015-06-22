@extends('layouts.default')

@section('main')

<div class="container">
    <div class="ui basic segment pagehead">
        <h1 class="ui header">
            <i class="icon setting"></i> Modify Setting
        </h1>
    </div>
    {{ Form::model($setting, ['method' => 'PATCH', 'route' => ['settings.update', $setting->id],'class'=>'ui form blue segment']) }}
        <div class="field">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name',$setting->name,['class'=>'form-control']) }}
        </div>
        <div class="field">
            {{ Form::label('slug', 'Slug') }}
            {{ Form::text('slug',$setting->slug,['class'=>'form-control','disabled'=>'disabled']) }}
        </div>
        <div class="field">
            {{ Form::label('value', 'Value') }}
            {{ Form::textarea('value',$setting->value,['class'=>'form-control ckeditor', 'rows'=>4]) }}
        </div>
        <div class="ui small buttons pull-right">
            <a href="{{ url('settings') }}" class='ui red button'>Cancel</a>
            {{ Form::submit('Update', ['class' => 'ui button']) }}
        </div>
    {{ Form::close() }}
</div>
@stop
