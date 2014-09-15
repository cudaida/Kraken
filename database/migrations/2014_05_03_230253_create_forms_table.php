<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('forms', function(Blueprint $table) {
			$table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->integer('formable_id');
            $table->string('formable_type');
            $table->integer('views');
            $table->integer('submissions');
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
		Schema::drop('forms');
	}

}
