<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrollmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('enrollments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('course_id')
                ->unsigned();
            $table->foreign('course_id')
                ->references('id')->on('courses')
                ->onDelete('cascade');
            $table->integer('course_role_id')
                ->unsigned()
                ->default(6);                       //default role to student
            $table->unique(['user_id', 'course_id','course_role_id']);
            $table->foreign('course_role_id')
                ->references('id')->on('course_roles')
                ->onDelete('cascade');
            $table->string('payment_type')
                ->nullable();
            $table->string('payment_reference')
                ->nullable();
            $table->date('payment_date')
                ->nullable();
            $table->decimal('payment_amount',6,2)
                ->nullable();
            $table->string('invoice_number')
                ->nullable();
            $table->date('course_start_date');
            $table->date('course_end_date');
            $table->timestamps();
            $table->boolean('privacy');
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
        Schema::drop('enrollments');

    }

}
