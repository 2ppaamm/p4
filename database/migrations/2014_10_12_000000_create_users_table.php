<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 60)->nullable();
            $table->string('image');
            $table->string('screename');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postcode');
            $table->string('country');
            $table->string('contact');
            $table->date('birthdate');
            $table->date('datejoined');
            $table->string('hinquestion');
            $table->string('hintanswer');
            $table->boolean('is_admin')
                ->default(FALSE);
            $table->boolean('privacy')
                ->default(FALSE);
			$table->string('remember_token',100)->nullable();
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
		Schema::drop('users');
	}

}
