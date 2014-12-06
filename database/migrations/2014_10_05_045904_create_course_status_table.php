<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStatusTable extends Migration {

	public function up()
	{
        Schema::create('course_statuses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('status')->unique();
            $table->string('description');
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
        Schema::drop('course_statuses');
	}

}
