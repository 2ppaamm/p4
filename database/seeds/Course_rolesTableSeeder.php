 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_role;
class Course_rolesTableSeeder extends Seeder {

	public function run()
	{
        $subject = Course_role::create(array(
            'description' => 'Course Creator',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Course Owner',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Department Head',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Teacher',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Teaching Assistant',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Student',
        ));

        $course_role = Course_role::create(array(
            'description' => 'Guest',
        ));
	}

}
