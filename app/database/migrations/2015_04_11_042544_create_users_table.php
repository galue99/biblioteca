<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->String('name');
			$table->String('lastname');
			$table->String('cedula');
			$table->String('password');
			$table->String('rol');
			$table->String('telefono')->nullable();
			$table->String('email')->nullable();
			$table->timestamps();
			$table->String('remember_token')->nullable();
		});
	}
//$2y$10$X/Wwl0UhtYG.pYap5So0c.gyorZZAgWynMt4cQNJyig68xLWDYSBC

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
