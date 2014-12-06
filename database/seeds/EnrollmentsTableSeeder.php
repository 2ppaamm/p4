 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Enrollment;

class EnrollmentsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        for ($i = 0; $i < 200; $i++)
        {
            $enrollment = Enrollment::create(array(
                'user_id' => $faker->randomNumber(1,11),
                'course_id' => $faker->randomNumber(1,10),
                'course_role_id' => 6,
                'privacy'=>False
            ));
        }
	}

}
