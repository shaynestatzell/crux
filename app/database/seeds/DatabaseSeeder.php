<?php
class DatabaseSeeder extends Seeder {
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('SettingsTableSeeder');

		/* ==== These tables still need work ==== */
		
		#$this->call('PostsTableSeeder');
		#$this->call('CategoriesTableSeeder');
		#$this->call('TagsTableSeeder');
		#$this->call('PostsTagsTableSeeder');
	}
}
