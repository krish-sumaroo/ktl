<?php

class CategoryTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('products')->delete();
		DB::table('categories')->delete();
		Category::create(['title' => 'Publications']);
		Category::create(['title' => 'Real Estate']);
	}
}