<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSections extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('course_sections', function(Blueprint $table)
        {
            $table->increments('id');
            $table->smallInteger('lesson_number');
            $table->string('title');
            $table->longText('description');
            $table->string('guid');
            $table->integer('course_id')
                ->unsigned();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->onDelete('cascade');
            $table->date('lesson_date')->nullable();
            $table->string('notes_arrangement')->nullable();
            $table->boolean('privacy')
                ->default(False);
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
        Schema::drop('course_sections');
    }

}
