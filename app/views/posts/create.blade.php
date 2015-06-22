@extends('layouts.default')

@section('main')

<div class="container">
    <h1 class="ui header">Create Post</h1>
    {{ Form::open(['route' => 'posts.store','class'=>'ui form']) }}
    <div class="two column stackable ui grid">
        <div class="column">
            <div class="ui blue segment">
                <div class="field">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', '',['class'=>'form-control']) }}
                </div>
                <div class="field">
                    {{ Form::label('slug', 'Slug') }}
                    {{ Form::text('slug', '',['class'=>'form-control']) }}
                </div>
                <div class="field">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', '', ['class'=>'form-control ckeditor', 'rows'=>4]) }}
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui red segment" style="margin-top:0">
                <div class="field">{{ Form::label('banner', 'Banner') }}
                    <div class="ui image dimmable cms-banner" id="post-banner" >
                        <img src="{{ url('img/no-post-image.png') }}" class="" alt="" />
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <i class="upload huge icon"></i>
                                    <div class="ui header">Upload new image</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ Form::file('banner',['class'=>'hidden']) }}
                </div>
                <div class="field ui input mini">
                    {{ Form::label('banner_alt', 'Alt Text') }}
                    {{ Form::text('banner_alt', '' , ['class'=>'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    <div class="ui green segment">
        <div class="field">
            {{ Form::label('excerpt', 'Post Excerpt') }}
            {{ Form::textarea('excerpt', '', ['class'=>'form-control', 'rows'=>4]) }}
        </div>
        <div class="field">
            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', '',['class'=>'form-control ckeditor', 'rows'=>4]) }}
        </div>
    </div>
        <div class="ui small buttons">
            {{ Form::submit('Update', ['class' => 'ui blue button']) }}
            <div class="or"></div>
            <a href="{{ url('posts') }}" class='ui red button'>Cancel</a>
        </div>
    {{ Form::close() }}
</div>
@stop
