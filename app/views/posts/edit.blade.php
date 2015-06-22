@extends('layouts.default')

@section('main')
<div class="ui segment cms-pagehead">
    <div class="container">
        <h1 class="ui header">Edit Post</h1>
    </div>
</div>
<div class="container">
    {{ Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id],'class'=>'ui form', 'files' => true]) }}
    <div class="two column stackable ui grid">
        <div class="column">
            <div class="ui blue segment">
                <div class="field">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title',$post->title,['class'=>'form-control']) }}
                </div>
                <div class="field">
                    {{ Form::label('slug', 'Slug') }}
                    {{ Form::text('slug',$post->slug,['class'=>'form-control']) }}
                </div>
                <div class="field">
                    {{ Form::label('description', 'Description') }}
                    {{ Form::textarea('description', $post->description, ['class'=>'form-control ckeditor', 'rows'=>4]) }}
                </div>
            </div>
        </div>
        <div class="column">
            <div class="ui red segment" style="margin-top:0">
                <div class="field">{{ Form::label('banner', 'Banner') }}
                    <div class="ui image dimmable cms-banner" id="post-banner" >
                        <img src="{{ isset($post->banner) ? url('uploads/'.$post->banner) : url('img/no-post-image.png') }}" class="" alt="" />
                        <div class="ui dimmer">
                            <div class="content">
                                <div class="center">
                                    <i class="upload huge icon"></i>
                                    <div class="ui header">Upload new image</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui divider"></div>
                    {{ Form::file('banner') }}
                </div>
                <div class="field ui input mini">
                    {{ Form::label('banner_alt', 'Alt Text') }}
                        {{ Form::text('banner_alt',$post->banner_alt,['class'=>'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    <?php
    /*
    <div class="ui segment">
        <div class="stackable ui grid">
            <div class="four wide column">
                <div class="field">
                    {{ Form::label('category_id') }}
                    <div class="ui dropdown selection">
                        {{ Form::hidden('category', $post->category) }}
                        <div class="default text">Category</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            @foreach($categories as $category_id => $category)
                            <div class="item" data-value="{{ $category_id }}">{{ $category }}</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="twelve wide column">
                <div class="field">
                    {{ Form::label('tags') }}
                    {{ Form::select('tags', $tags) }}
                </div>
            </div>
        </div>
    </div>
    */
    ?>
    <div class="ui green segment">
        <div class="field">
            {{ Form::label('excerpt', 'Post Excerpt') }}
            {{ Form::textarea('excerpt', $post->excerpt,['class'=>'form-control ckeditor', 'rows'=>4]) }}
        </div>
        <div class="field">
            {{ Form::label('content', 'Content') }}
            {{ Form::textarea('content', $post->content,['class'=>'form-control ckeditor', 'rows'=>4]) }}
        </div>
    </div>
        <div class="ui small buttons">
            {{ Form::submit('Update', ['class' => 'ui blue button']) }}
            <a href="{{ url('posts') }}" class='ui red button'>Cancel</a>
        </div>
    {{ Form::close() }}
</div>
@stop
