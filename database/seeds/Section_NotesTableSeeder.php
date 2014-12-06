<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_section_note;
class Section_notesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $section_note = Course_section_note::create(array(
            'title'=>'Note 1.1',
            'note_order' => 1,
            'description' => 'Self-words',
            'course_section_id' => 1,
            'link' => 'http://school.all-gifted.com/pluginfile.php/1738/mod_lesson/page_contents/82/Lesson%201.1.html#/',
            'user_id' => 1,
            'note_type_id' => 3,
            'privacy' => FALSE
        ));

        for ($i = 0; $i < 30; $i++)
        {
            $note = Course_section_note::create(array(
                'title'=>'Note 1'.$i,
                'note_order'=>$i,
                'description' => $faker->sentence(2),
                'course_section_id' => $faker->randomNumber(1, 15),
                'user_id' => $faker->randomNumber(1,10),
                'note_type_id' => $faker->randomNumber(1,8),
                'privacy' => FALSE
            ));
        }
        for ($i = 0; $i < 200; $i++)
        {
            $note = Course_section_note::create(array(
                'note_order' => $i+31,
                'course_section_id' => $faker->randomNumber(1,100 ),
                'title'=>'Note 2'.$i,
                'user_id' => $faker->randomNumber(1,10),
                'description' => 'Note'.$faker->text(),
                'note_type_id' => $faker->randomNumber(1,8),
                'link' => 'http://lorempixel.com/400/200/food/',
                'privacy' => FALSE
            ));
        }
    }

}