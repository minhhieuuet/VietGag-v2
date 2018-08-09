<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKryptonit3CounterPageVisitorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kryptonit3_counter_page_visitor', function(Blueprint $table)
		{
			$table->bigInteger('page_id')->unsigned()->index();
			$table->bigInteger('visitor_id')->unsigned()->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kryptonit3_counter_page_visitor');
	}

}
