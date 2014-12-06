<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('access_controls', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('node_type');
            $table->foreign('node_type')->references('name')->on('nodes');
            $table->integer('node_id');
            $table->integer('course_role_type')->unsigned();
            $table->foreign('course_role_type')->references('id')->on('course_roles');
            $table->boolean('create');
            $table->boolean('read');
            $table->boolean('update');
            $table->boolean('delete');
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
		Schema::drop('access_controls');
	}

}
