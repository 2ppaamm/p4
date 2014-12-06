<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTeachableTable extends Migration {
	public function up()
	{
        Schema::create('instructor_course', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('course_code_id')->unsigned();
            $table->foreign('course_code_id')->references('id')->on('course_codes')->onDelete('cascade');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('course_role_id')->unsigned();
            $table->foreign('course_role_id')->references('id')->on('course_roles')->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('instructor_course');
	}

}
