@extends('layouts.default')

@section('main')
<div class="container">
    <div class="ui basic segment pagehead">
        <h1 class="ui header">
            <i class="icon setting"></i> Settings
        </h1>
    </div>
    @if ($settings->count())
    <table class="ui table padded blue segment" valign=top>
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th colspan=2>Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($settings as $setting)
            <tr class="ui form">
                <td>{{ $setting->name }}</td>
                <td>{{ $setting->slug }}</td>
                <td>{{ $setting->value }}</td>
                <td class="clearfix">

                    <div class="ui tiny buttons control-group pull-right">
                    {{ Form::open(array('method' => 'DELETE', 'route' => array('settings.destroy', $setting->id))) }}
                        {{ link_to_route('settings.edit', 'Edit', array($setting->id), array('class' => 'ui button')) }}
                        {{ Form::submit('Delete', array('class' => 'ui button red')) }}
                    {{ Form::close() }}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    No settings defined
    @endif
</div>
@stop
