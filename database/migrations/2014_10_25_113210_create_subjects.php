<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        //
        Schema::create('subjects', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description');
            $table->integer('framework_id')
                ->unsigned();
            $table->foreign('framework_id')
                ->references('id')->on('frameworks')
                ->onDelete('cascade');
            $table->string('icon');
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
        Schema::drop('subjects');

    }

}
