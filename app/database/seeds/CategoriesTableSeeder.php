<?php
class CategoriesTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'categories';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			['name'=>'General'],
			['name'=>'Announcements']
		];

		DB::table($this->table)->insert($this->data);
	}

}
