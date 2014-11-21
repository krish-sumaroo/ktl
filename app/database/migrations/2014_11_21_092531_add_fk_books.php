<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkBooks extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('books', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('books', function(Blueprint $table)
		{
			//$table->dropColumn(array('product_id', 'category_id', 'user_id'));
			//$table->dropForeign('product_id');
		});
	}

}
