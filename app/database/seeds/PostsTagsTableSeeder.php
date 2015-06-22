<?php
class PostsTagsTableSeeder extends Seeder {

	private $table;
	private $data;

	public function __construct() {
		$this->table = 'post_tag';
		$this->data  = [];
	}

	public function run()
	{
		DB::table($this->table)->truncate();

		$this->data = [
			[
				'post_id'=>'1',
				'tag_id'=>'1'
			],
			[
				'post_id'=>'2',
				'tag_id'=>'1'
			],
			[
				'post_id'=>'3',
				'tag_id'=>'2'
			],
			[
				'post_id'=>'4',
				'tag_id'=>'5'
			],
			[
				'post_id'=>'5',
				'tag_id'=>'2'
			],
			[
				'post_id'=>'6',
				'tag_id'=>'4'
			]
		];

		DB::table($this->table)->insert($this->data);
	}

}
