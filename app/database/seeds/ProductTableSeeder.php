<?php

class ProductTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('products')->delete();
		Product::create(['title' => 'Books','category_id' => 1]);
		Product::create(['title' => 'Magazines','category_id' => 1]);
		Product::create(['title' => 'Comics','category_id' => 1]);
		Product::create(['title' => 'Land','category_id' => 2]);
		Product::create(['title' => 'Houses','category_id' => 2]);
		Product::create(['title' => 'Appartments','category_id' => 2]);		
	}
}