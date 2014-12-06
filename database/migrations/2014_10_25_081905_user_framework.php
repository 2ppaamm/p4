<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserFramework extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('user_framework', function(Blueprint $table)
        {
            $table->integer('YYMMDD');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('framework_id')
                ->unsigned();
            $table->foreign('framework_id')
                ->references('id')->on('frameworks')
                ->onDelete('cascade');
            $table->string('level');
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
        Schema::drop('user_framework');
    }

}
