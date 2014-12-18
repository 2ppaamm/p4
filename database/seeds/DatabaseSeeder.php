<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

//        $this->call('NodeTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('FrameworksTableSeeder');
        $this->call('SubjectsTableSeeder');
        $this->call('Course_typesTableSeeder');
        $this->call('Course_statusTableSeeder');
        $this->call('CourseCodesTableSeeder');
        $this->call('Course_rolesTableSeeder');
        $this->call('CoursesTableSeeder');
        $this->call('Note_typesTableSeeder');
        $this->call('Course_sectionsTableSeeder');
        $this->call('Section_notesTableSeeder');
        $this->call('EnrollmentsTableSeeder');
	}

}
