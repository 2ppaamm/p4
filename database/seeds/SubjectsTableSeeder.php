 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Subject;
class SubjectsTableSeeder extends Seeder {

	public function run()
	{
        $subject = Subject::create(array(
            'description' => 'English Reading',
            'framework_id' => 1,
            'icon' => 'icon-book'
        ));

        $subject = Subject::create(array(
            'description' => 'English Writing',
            'framework_id' => 2,
            'icon' => 'icon-pencil'
        ));

        $subject = Subject::create(array(
            'description' => 'English Vocabulary',
            'framework_id' => 3,
            'icon' => 'icon-speech'
        ));

        $subject = Subject::create(array(
            'description' => 'Math Numbers',
            'framework_id' => 4,
            'icon' => 'icon-anchor'
        ));

        $subject = Subject::create(array(
            'description' => 'Math Algebra',
            'framework_id' => 5,
            'icon' => 'icon-superscript'
        ));

        $subject = Subject::create(array(
            'description' => 'Math Measurements',
            'framework_id' => 6,
            'icon' => 'icon-flask'
        ));

        $subject = Subject::create(array(
            'description' => 'Math Geometry',
            'framework_id' => 7,
            'icon' => 'icon-compass'
        ));
        $subject = Subject::create(array(
            'description' => 'Calculus',
            'framework_id' => 8,
            'icon' => 'icon-subscript'
        ));
        $subject = Subject::create(array(
            'description' => 'Computing',
            'framework_id' => 9,
            'icon' => 'icon-code'
        ));
	}

}
