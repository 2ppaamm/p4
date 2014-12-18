 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course;
use App\Enrollment;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $course = Course::create([
            'title' => 'Dynamic Website Application',
            'description' => 'This course is the next step for students who have experience with HTML/CSS and are looking to take their web programming skills to the next level with server-side web development. Websites can be relatively static mediums: a simple portfolio or a site for a local coffee shop are two examples of basic sites with hard-coded content. This format works well for presenting the same information for every visitor to the site. Web applications, however, take websites to the next level. Think about your experience with online banks, tools like Google Docs, and online stores like Amazon. These are all robust applications operating with databases and offering a personalized experience to each individual user. Over the course of the semester we cover the skills necessary to evolve simple static websites into dynamic, database-driven web applications. The following technologies are covered: object-oriented PHP using the expressive MVC framework, Laraval, basic server setup and management, version control with Git, dependency management, testing, and other modern web development practices.',
            'course_creator' => 2,
            'course_code_id'=>1,
            'course_type_id' => 2,
            'subject_id' => 9,
            'prereqlevel' => 1200,
            'targetlevel' => 1300,
            'cost' => 2000,
            'duration' => 15,
            'cover' => 'http://upload.wikimedia.org/wikipedia/en/8/89/ExtensionFlag.png',
            'privacy'=>False
        ]);
        $course = Course::create([
            'title' => 'Teaching your toddler to read',
            'description' => 'Yes, we do have a course to teach a baby to read!<p>Preparing a baby to read means to making him understand that symbols relate to meanings. The course will teach a toddler to understand and link to alphabets and numbers.</p>This course is a 3 months\' access to materials to teach a baby up to three years old to read. If your baby is older than 2 years and 9 months old, the benefits might not as visible.<p>Our course is based upon tried and tested methods researched through decades and tested on millions of children.</p><p>Although many children who have been through the program gained photographic memory, we do not have enough statistics to prove that this is indeed true, and thus this is not our claim. While millions start to read at record age, we believe results do vary with the way the parents use the resources we provide.</p>',
            'course_creator' => 1,
            'course_code_id'=>2,
            'course_type_id' => 1,
            'subject_id' => 1,
            'prereqlevel' => 0,
            'targetlevel' => 100,
            'cost' => 300,
            'duration' => 26,
            'cover' => 'http://school.all-gifted.com/pluginfile.php/1463/course/overviewfiles/Hands-Down-2-1280x960.jpg',
            'privacy'=>False
        ]);

        for ($i = 1; $i < 5; $i++)
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

            $enrollment = Enrollment::create(array(
                'user_id' => $course->course_creator,
                'course_id' => $i+1,
                'course_role_id' => 1,
                'privacy'=>False
            ));
        }
	}

}
