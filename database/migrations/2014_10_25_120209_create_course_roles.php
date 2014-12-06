<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRoles extends Migration {

    public function up()
    {
        //
        Schema::create('course_roles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description')->unique();
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
        Schema::drop('course_roles');


    }

}
