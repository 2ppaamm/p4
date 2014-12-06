<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('courses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->integer('course_type_id')->unsigned();
            $table->foreign('course_type_id')->references('id')->on('course_types');
            $table->integer('course_creator')->unsigned();
            $table->foreign('course_creator')->references('id')->on('users');
            $table->string('cover');
            $table->integer('course_code_id')->unsigned();
            $table->foreign('course_code_id')->references('id')->on('course_codes');
            $table->string('description');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->smallInteger('prereqlevel');
            $table->smallInteger('targetlevel');
            $table->decimal('cost',6,2);
            $table->smallInteger('duration');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('privacy')->default(TRUE);
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
        //
        Schema::drop('courses');

    }
}
