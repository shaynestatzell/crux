<?php

class Setting extends Eloquent {
	protected $guarded = [];

    public static $rules = [
        'name' => 'required',
        'slug' => 'required',
        'value' => 'required'
    ];

    public $timestamps = false;

    public static function asObj()
    {
        $arr = [];
        foreach (static::all() as $setting) {
            $arr[$setting->slug] = "$setting->value";
        }
        $settings = (object) $arr;
        return $settings;
    }
}
