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
            'course_id' => $faker->randomNumber(2, 6),
            'guid' => 'http://lorempixel.com/400/200/',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>1,
            'title'=>'Lecture 1',
            'description' => '<ul>
                <li>Introduction</li>
                <li><a target="_blank" href="https://github.com/susanBuck/notes/blob/master/07_Version_Control/03_Setup_local_server.md">Setting up local server</a></li>
                <li>Command Line</li>
                </ul>',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);
        $section = Course_section::create([
            'lesson_number' =>2,
            'title'=>'Lecture 2',
            'description' => 'Git / Version Control, Live servers and deploying',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>3,
            'title'=>'Lecture 3',
            'description' => 'PHP Basics',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>4,
            'title'=>'Lecture 4',
            'description' => 'More Php',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>5,
            'title'=>'Lecture 5',
            'description' => 'Setting up / Getting to know Laravel...',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>6,
            'title'=>'Lecture 6',
            'description' => 'Routes Recap/Building Foobooks',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>7,
            'title'=>'Lecture 7',
            'description' => 'Views, OOP and Forms',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>8,
            'title'=>'Lecture 8',
            'description' => 'Databases',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>9,
            'title'=>'Lecture 9',
            'description' => 'Production Environment/Eloquent',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>10,
            'title'=>'Lecture 10',
            'description' => 'DB Relations/Authentications',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>11,
            'title'=>'Lecture 11',
            'description' => 'Controllers/Validation',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>12,
            'title'=>'Lecture 12',
            'description' => 'Thanksgiving',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>13,
            'title'=>'Lecture 13',
            'description' => 'Model events: Deleting a row in a many to many relationship / Seeding / JavaScript/Ajax / Email / Scheduling tasks with Cron / Backups / HTTPS/SSL',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>14,
            'title'=>'Lecture 14',
            'description' => 'Workshops',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        $section = Course_section::create([
            'lesson_number' =>15,
            'title'=>'Lecture 15',
            'description' => 'Website vs Web Applications',
            'course_id' => 1,
            'guid' => 'https://pbs.twimg.com/profile_images/3530989783/a9016575d35a35e413b880e8b3eeb11d_400x400.jpeg',
            'privacy' => FALSE
        ]);

        for ($i = 1; $i < 10; $i++)
        {
            $course_section = Course_section::create([
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson is about '.$faker->text(),
            'course_id' => $faker->randomNumber(2, 5),
            'guid' => 'http://lorempixel.com/400/200/sports/',
            'privacy' => FALSE
            ]);
        }
        for ($i = 10; $i < 20; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson is about '.$faker->sentence(),
            'course_id' => $faker->randomNumber(2,6),
            'guid' => 'http://lorempixel.com/400/200/people/',
            'privacy' => FALSE
            ));
        }
        for ($i = 20; $i < 30; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson description sound like '.$faker->sentence(),
            'course_id' => $faker->randomNumber(2,6),
            'guid' => 'http://lorempixel.com/400/200/fashion/',
            'privacy' => FALSE
             ));
        }
        for ($i = 31; $i < 40; $i++)
        {
            $course_section = Course_section::create(array(
            'lesson_number' => $i,
            'title'=>$faker->sentence(2),
            'description' => 'Lesson description is '.$faker->sentence(),
            'course_id' => $faker->randomNumber(2,6),
            'guid' => 'http://lorempixel.com/400/200/food/',
            'privacy' => FALSE
            ));
        }
    }

}