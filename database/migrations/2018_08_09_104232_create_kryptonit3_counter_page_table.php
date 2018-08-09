<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKryptonit3CounterPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kryptonit3_counter_page', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('page', 191)->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kryptonit3_counter_page');
	}

}
