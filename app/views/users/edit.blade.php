@extends('layouts.default')

@section('main')
<div class="container">
    <div class="ui basic segment">
        <h1 class="ui header">Edit {{ $user->fullname }} <img class="ui avatar image pull-right" src="{{ get_gravatar($user->email) }}" alt="" /></h1>
    </div>
    {{ Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id],'class'=>'ui form blue segment']) }}
        <div class="field">
            {{ Form::label('fullname', 'Name') }}
            {{ Form::text('fullname',$user->fullname,['class'=>'form-control']) }}
            <div class="ui divider"></div>
        </div>
        <div class="field">
            {{ Form::label('username', 'Username') }}
            {{ Form::text('username',$user->username,['class'=>'form-control']) }}
            <div class="ui divider"></div>
        </div>
        <div class="field">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email',$user->email,['class'=>'form-control', 'rows'=>4]) }}
        </div>
        <div class="field">
            {{ Form::label('role', 'Role') }}
            <div class="ui dropdown selection">
                {{ Form::hidden('role', $user->role) }}
                <div class="default text">Role</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item" data-value="0">Administrator</div>
                    <div class="item" data-value="1">Editor</div>
                </div>
            </div>
            <div class="ui divider"></div>
        </div>
        <div class="field">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}
        </div>
        <div class="field">
            {{ Form::label('password_confirm', 'Confirm Password') }}
            {{ Form::password('password_confirmation') }}
        </div>
        <div class="ui small buttons">
            {{ Form::submit('Update', ['class' => 'ui blue button']) }}
            <div class="or"></div>
            <a href="{{ url('users') }}" class='ui red button'>Cancel</a>
        </div>
    {{ Form::close() }}
</div>
@stop
