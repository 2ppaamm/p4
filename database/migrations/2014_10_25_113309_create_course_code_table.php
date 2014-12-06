<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseCodeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_codes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('course_code')->nullable()->unique();
            $table->integer('course_type_id')->unsigned();
            $table->foreign('course_type_id')->references('id')->on('course_types');
            $table->integer('course_author')->unsigned();
            $table->foreign('course_author')->references('id')->on('users');
            $table->integer('course_status_id')->unsigned();
            $table->foreign('course_status_id')->references('id')->on('course_statuses');
            $table->string('cover');
            $table->string('title')->unique;
            $table->string('description');
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->smallInteger('prereqlevel');
            $table->smallInteger('targetlevel');
            $table->decimal('cost',6,2);
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
        Schema::drop('course_codes');
    }

}
