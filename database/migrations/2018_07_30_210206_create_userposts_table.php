<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserpostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userposts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->string('src', 191);
			$table->integer('idCategory')->default(1);
			$table->integer('UserId');
			$table->boolean('approved')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('userposts');
	}

}
