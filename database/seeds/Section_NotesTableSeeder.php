<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_section_note;
class Section_notesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        $section_note = Course_section_note::create([
            'title'=>'Website vs Web Application',
            'note_order' => 1,
            'description' => 'Difference between Websites and web apps',
            'course_section_id' => 2,
            'link' => '/storage/notes/php-web-sites-vs-apps@2x.png',
            'user_id' => 2,
            'note_type_id' => 10,
            'privacy' => FALSE
        ]);

        $section_note = Course_section_note::create([
            'title'=>'Pieces of the Web Development Puzzle',
            'note_order' => 2,
            'description' => '<h4>Server side capabilities</h4>
                <ul>
                    <li>Manipulate (create, read, update, delete) information from a database.</li>
                    <li>Maintain users / logins; remember information across sessions.</li>
                    <li>Send email.</li>
                    <li>Upload and manipulate files on a server.</li>
                    <li>Communicate with other sites.</li>
                    <li>Etc.</li>
                </ul>',
            'course_section_id' => 2,
            'link' => 'http://making-the-internet.s3.amazonaws.com/misc-puzzle.png',
            'user_id' => 2,
            'note_type_id' => 10,
            'privacy' => FALSE
        ]);

        $section_note = Course_section_note::create([
            'title'=>'Course Information',
            'note_order' => 3,
            'description' => '<h4>Instructor & TA Intros</h4>
                <h4>Topics we\'ll cover in this course</h4>
                <ul>
                    <li>Local and production server management.</li>
                    <li>Version Control with Git and Github.</li>
                    <li>PHP.</li>
                    <li>The MVC framework Laravel.</li>
                    <li>Dependency management with Composer.</li>
                </ul>
                <h4>Level of difficulty / expectations</h4>
                <h4>Syllabus / Course Logistics</h4>
                <ul>
                    <li><a href="http://dwa15.com">http://dwa15.com</a></li>
                    <li>Course adjustments.</li>
                </ul>
                <h4>Suggested strategy</h4>
                <ol>
                    <li>Pre-lecture: Skim the notes.</li>
                    <li>Lecture: Take notes; don\'t try to code along with the lecture on your laptop.</li>
                    <li>Post-lecture: Go through the notes again and complete any tasks which were covered.</li>
                    <li>Document everything you do.</li>
                    <li>Make notes about what you don\'t understand— go back and answer those questions as you move along.</li>
                </ol>',
            'course_section_id' => 2,
            'link' => '',
            'user_id' => 2,
            'note_type_id' => 2,
            'privacy' => FALSE
        ]);
        $section_note = Course_section_note::create([
            'title'=>'Course Information',
            'note_order' => 4,
            'description' => '<h4>Instructor & TA Intros</h4>
                <h4>Topics we\'ll cover in this course</h4>
                <ul>
                    <li>Local and production server management.</li>
                    <li>Version Control with Git and Github.</li>
                    <li>PHP.</li>
                    <li>The MVC framework Laravel.</li>
                    <li>Dependency management with Composer.</li>
                </ul>
                <h4>Level of difficulty / expectations</h4>
                <h4>Syllabus / Course Logistics</h4>
                <ul>
                    <li><a href="http://dwa15.com">http://dwa15.com</a></li>
                    <li>Course adjustments.</li>
                </ul>
                <h4>Suggested strategy</h4>
                <ol>
                    <li>Pre-lecture: Skim the notes.</li>
                    <li>Lecture: Take notes; don\'t try to code along with the lecture on your laptop.</li>
                    <li>Post-lecture: Go through the notes again and complete any tasks which were covered.</li>
                    <li>Document everything you do.</li>
                    <li>Make notes about what you don\'t understand— go back and answer those questions as you move along.</li>
                </ol>',
            'course_section_id' => 2,
            'link' => '',
            'user_id' => 2,
            'note_type_id' => 2,
            'privacy' => FALSE
        ]);
        $section_note = Course_section_note::create([
            'title'=>'Setting up a local server',
            'note_order' => 5,
            'description' => 'Setting up',
            'course_section_id' => 2,
            'link' => 'https://github.com/susanBuck/notes/blob/master/07_Version_Control/03_Setup_local_server.md',
            'user_id' => 2,
            'note_type_id' => 5,
            'privacy' => FALSE
        ]);

        $section_note = Course_section_note::create([
            'title'=>'Lecture video',
            'note_order' => 6,
            'description' => 'Of course this is not the lecture video, I just don\'t have time to download them all',
            'course_section_id' => 2,
            'link' => "//www.youtube.com/embed/MlF1mf6s94w",
            'user_id' => 2,
            'note_type_id' => 1,
            'privacy' => FALSE
        ]);

        for ($i = 0; $i < 15; $i++)
        {
            $note = Course_section_note::create(array(
                'title'=>'Note 1'.$i,
                'note_order'=>$i,
                'description' => $faker->sentence(2),
                'course_section_id' => $faker->randomNumber(17, 30),
                'user_id' => $faker->randomNumber(1,10),
                'note_type_id' => $faker->randomNumber(1,8),
                'privacy' => FALSE
            ));
        }
        for ($i = 0; $i < 50; $i++)
        {
            $note = Course_section_note::create(array(
                'note_order' => $i+31,
                'course_section_id' => $faker->randomNumber(17,100 ),
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