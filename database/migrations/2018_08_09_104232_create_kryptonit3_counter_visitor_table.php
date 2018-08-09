<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKryptonit3CounterVisitorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kryptonit3_counter_visitor', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('visitor', 191)->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kryptonit3_counter_visitor');
	}

}
