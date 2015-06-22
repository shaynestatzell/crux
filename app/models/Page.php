<?php

class Page extends Eloquent {
	protected $guarded = [];

	public static $rules = [
		'title' => 'required',
		'slug' => 'required',
		'content' => 'required'
	];
}
