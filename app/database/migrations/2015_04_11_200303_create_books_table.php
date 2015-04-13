<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	
	public function up()
	{
		Schema::create('books', function(Blueprint $table)
		{
			$table->increments('id');
			$table->String('isbn');
			$table->String('cod_idioma');
			$table->String('title');
			$table->String('cota');
			$table->String('author');
			$table->String('tematica');
			$table->String('ubicacion');
			$table->String('cover');
			$table->Integer('disponibilidad');
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
		Schema::drop('books');
	}

}
