<?php
class SettingsTableSeeder extends Seeder {
	private $table;
	private $data;

	public function __construct() {
		$this->table = 'settings';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			['name'=>'Sitename', 'slug' => 'sitename', 'value'=>'Crux' ],
			['name'=>'Facebook URL', 'slug'=>'facebook', 'value'=>'http://facebook.com/{NAME}'],
			['name'=>'Default Meta Description', 'slug'=>'meta_description', 'value'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
			['name'=>'Language', 'slug'=>'lang', 'value'=> 'en-US'],
			['name'=>'Twitter URL', 'slug'=>'twitter', 'value'=> 'http://www.twitter.com/{USER}'],
			['name'=>'Google Analytics Code (Key)', 'slug'=>'ga_key', 'value'=> 'XX-XXXXXXX']
		];

		DB::table($this->table)->insert($this->data);
	}

}
