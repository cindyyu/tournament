<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('username');
			$table->string('password', 60);
			$table->string('coach');
			$table->integer('phone');
			$table->string('email');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->integer('zipcode');
			$table->string('schoolcode');
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
		Schema::drop('users');
	}

}
