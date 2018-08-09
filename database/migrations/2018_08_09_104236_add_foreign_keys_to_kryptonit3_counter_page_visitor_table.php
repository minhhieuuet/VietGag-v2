<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKryptonit3CounterPageVisitorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kryptonit3_counter_page_visitor', function(Blueprint $table)
		{
			$table->foreign('page_id')->references('id')->on('kryptonit3_counter_page')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('visitor_id')->references('id')->on('kryptonit3_counter_visitor')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kryptonit3_counter_page_visitor', function(Blueprint $table)
		{
			$table->dropForeign('kryptonit3_counter_page_visitor_page_id_foreign');
			$table->dropForeign('kryptonit3_counter_page_visitor_visitor_id_foreign');
		});
	}

}
