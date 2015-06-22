<?php
class PagesTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'pages';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			[
			'title'=>'Home',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'slug'=>'home',
			'canonical'=>'',
			'nav' => 1
			],
			[
			'title'=>'Contact',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'slug'=>'contact',
			'canonical'=>'',
			'nav' => 1
			],

			// Page that doesn't show up on nav
			[
			'title'=>'Terms',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'content'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'slug'=>'terms',
			'canonical'=>'',
			'nav' => 0
			]
		];

		DB::table($this->table)->insert($this->data);
	}

}
