 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_code;

class CourseCodesTableSeeder extends Seeder {

	public function run()
	{
        $course_code = Course_code::create([
            'title' => 'Dynamic Web Applications',
            'description' => 'This course is the next step for students who have experience with HTML/CSS and are looking to take their web programming skills to the next level with server-side web development. Websites can be relatively static mediums: a simple portfolio or a site for a local coffee shop are two examples of basic sites with hard-coded content. This format works well for presenting the same information for every visitor to the site. Web applications, however, take websites to the next level. Think about your experience with online banks, tools like Google Docs, and online stores like Amazon. These are all robust applications operating with databases and offering a personalized experience to each individual user. Over the course of the semester we cover the skills necessary to evolve simple static websites into dynamic, database-driven web applications. The following technologies are covered: object-oriented PHP using the expressive MVC framework, Laraval, basic server setup and management, version control with Git, dependency management, testing, and other modern web development practices.',
            'course_author' => 2,
            'course_code'=>'CSCI E-15',
            'course_status_id'=>3,
            'course_type_id' => 2,
            'subject_id' => 9,
            'prereqlevel' => 1200,
            'targetlevel' => 1300,
            'cost' => 2000,
            'cover' => 'https://www.google.com.au/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0CAcQjRw&url=http%3A%2F%2Fen.wikipedia.org%2Fwiki%2FHarvard_Extension_School&ei=_7aBVPywBtXm8AXs2oCwDA&bvm=bv.80642063,d.dGc&psig=AFQjCNGsiNNdFEj3P3hPhgGLd1WesorkPQ&ust=1417873533132573',
            'privacy'=>False
        ]);

        $course = Course_code::create([
            'title' => 'Preparing your toddler to read',
            'description' => 'Yes, we do have a course to teach a baby to read! Preparing a baby to read means to making him understand that symbols relate to meanings. The course will teach a toddler to understand and link to alphabets and numbers. This course is a 3-month access to materials to teach a baby up to three years old to read. If your baby is older than 2 years and 9 months old, the benefits might not as visible. Our course is based upon tried and tested methods researched through decades and tested on millions of children.Although many children who have been through the program gained photographic memory, we do not have enough statistics to prove that this is indeed true, and thus this is not our claim. While millions start to read at record age, we believe results do vary with the way the parents use the resources we provide.',
            'course_author' => 1,
            'course_code'=>'READTODD001',
            'course_status_id'=>3,
            'course_type_id' => 4,
            'subject_id' => 1,
            'prereqlevel' => 0,
            'targetlevel' => 100,
            'cost' => 150,
            'cover' => 'http://school.all-gifted.com/pluginfile.php/1463/course/overviewfiles/Hands-Down-2-1280x960.jpg',
            'privacy'=>False
        ]);
    }

}
