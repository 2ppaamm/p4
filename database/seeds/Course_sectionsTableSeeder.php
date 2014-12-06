<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_section;
use App\Class_section;
class Course_sectionsTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        $section = Course_section::create([
            'lesson_number' =>1,
            'title'=>'Reading for Toddler',
            'description' => 'Lesson 1.1',
            'course_id' => $faker->randomNumber(1, 10),
            'guid' => 'http://lorempixel.com/400/200/',
            'privacy' => FALSE
        ]);
        for ($i = 0; $i < 10; $i++)
        {
            $course_section = Course_section::create([
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson is about '.$faker->text(),
            'course_id' => $faker->randomNumber(1, 10),
            'guid' => 'http://lorempixel.com/400/200/sports/',
            'privacy' => FALSE
            ]);
        }
        for ($i = 0; $i < 20; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson is about '.$faker->sentence(),
            'course_id' => $faker->randomNumber(1,10),
            'guid' => 'http://lorempixel.com/400/200/people/',
            'privacy' => FALSE
            ));
        }
        for ($i = 0; $i < 30; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson description sound like '.$faker->sentence(),
            'course_id' => $faker->randomNumber(1,10),
            'guid' => 'http://lorempixel.com/400/200/fashion/',
            'privacy' => FALSE
             ));
        }
        for ($i = 0; $i < 40; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson description is '.$faker->sentence(),
            'course_id' => $faker->randomNumber(1,10),
            'guid' => 'http://lorempixel.com/400/200/food/',
            'privacy' => FALSE
            ));
        }
    }

}