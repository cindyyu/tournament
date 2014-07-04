<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstname'); 
			$table->string('lastname'); 
			$table->integer('phone');
			$table->string('email')->unique();
			$table->string('sex', 1);
			$table->string('event1');
			$table->string('event2');
			$table->string('event3');
			$table->string('school_id');

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
		Schema::drop('students');
	}

}
