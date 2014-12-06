 <?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Course_type;
class Course_typesTableSeeder extends Seeder {

	public function run()
	{
        $Course_type = \App\Course_type::create(array(
            'name' => 'Rolling - start any time',
            'description' => 'Students progress as they wish'
        ));

        $Course_type = Course_type::create(array(
            'name' => 'Semester (15 weeks)',
            'description' => 'Follows a semester'
        ));

        $Course_type = Course_type::create(array(
            'name' => 'Month',
            'description' => 'Renewed monthly'
        ));

        $Course_type = Course_type::create(array(
            'name' => 'Quarter/3 months',
            'description' => 'Renewed Quarterly'
        ));

        $Course_type = Course_type::create(array(
            'name' => 'Year',
            'description' => 'Completes in a year'
        ));
    }
}
