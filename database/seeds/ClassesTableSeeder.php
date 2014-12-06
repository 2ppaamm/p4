<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Classes;

class ClassesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++)
        {
            $class = Classes::create(array(
                'id' => \Faker\Provider\Uuid::numerify($i+1),
                'title' => 'Class '.$faker->word(2),
                'cover' => 'http://mycollegeguide.org/blog/wp-content/uploads/2011/12/study-group.jpg',
                'description'=>$faker->sentence(),
                'course_id' => $faker->randomNumber(1, 10),
                'start_date' => $faker->dateTimeThisYear,
                'duration_weeks' => $faker->randomNumber(1,52),
                'end_date' => $faker->dateTimeBetween()
            ));
        }
    }

}