<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('course_section_notes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('note_order')->default(999);
            $table->string('title');
            $table->longText('description');
            $table->string('link')->default('/storage/notes/default-cover.jpg');
            $table->integer('course_section_id')
                ->unsigned();
            $table->foreign('course_section_id')
                ->references('id')->on('course_sections')
                ->onDelete('cascade');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('note_type_id')
                ->unsigned()
                ->nullable();
            $table->foreign('note_type_id')
                ->references('id')->on('note_types')
                ->onDelete('cascade');
            $table->boolean('privacy')
                ->default(TRUE);
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
        Schema::drop('course_section_notes');
    }

}
