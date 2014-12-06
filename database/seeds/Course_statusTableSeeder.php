 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_status;
class Course_statusTableSeeder extends Seeder {

	public function run()
	{
        $Course_status = Course_status::create(array(
            'status' => 'Pending author approval',
            'description' => 'Due diligence check on course author'
        ));

        $Course_status = Course_status::create(array(
            'status' => 'Pending course approval',
            'description' => 'Auditing course'
        ));

        $Course_status = Course_status::create(array(
            'status' => 'Available for enrollment',
            'description' => 'Course available for enrolment'
        ));

        $Course_status = Course_status::create(array(
            'status' => 'Deprecated',
            'description' => 'Course discontinued'
        ));
    }
}
