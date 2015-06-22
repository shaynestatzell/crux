<?php

class Post extends Eloquent {
	protected $guarded = [];

	public static $rules = [
		'title' => 'required',
		'slug' => 'required',
        'content' => 'required',
    ];
	
    public function category()
    {
        return $this->belongsTo('Category');
    }
    public function tags()
    {
        return $this->belongsToMany('Tag');
    }
}
