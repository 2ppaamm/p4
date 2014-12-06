 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        for ($i = 0; $i < 10; $i++)
        {
            $course = Course::create([
                'title' => 'Course Number'.$i,
                'description' => $faker->paragraph(10),
                'course_creator' => $faker->randomNumber(1,10),
                'course_code_id'=>$faker->randomNumber(1,2),
                'course_type_id' => $faker->randomNumber(1,5),
                'subject_id' => $faker->randomNumber(1,9),
                'prereqlevel' => $faker->randomNumber(100,300),
                'targetlevel' => $faker->randomNumber(400,1300),
                'cost' => $faker->randomNumber(200,400),
                'duration' => $faker->randomNumber(1,52),
                'cover' => 'http://www.lorempixel.com/g/600/400/',
                'privacy'=>False
            ]);
        }
	}

}
